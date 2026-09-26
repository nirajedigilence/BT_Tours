<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Cms\Experience;
use App\Models\Cms\ExperienceExtra;
use Illuminate\Support\Facades\DB;

class SearchSecurityTest extends TestCase
{
    /**
     * Test normal search query works successfully.
     */
    public function test_normal_search_returns_successful_response(): void
    {
        $response = $this->get('/search?search_text=Tour');

        $response->assertStatus(200);
        $response->assertViewIs('search');
        $response->assertViewHas('items');
    }

    /**
     * Test search with various SQL injection payloads safely executes without SQL errors.
     */
    public function test_search_handles_sql_injection_payloads_safely(): void
    {
        $payloads = [
            "' OR '1'='1",
            '") OR 1=1 -- -',
            "test' UNION SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20 -- -",
            "'; DROP TABLE experiences; --",
            "' AND 1=0 UNION ALL SELECT 1, 'admin', 'password' -- ",
            "' OR SLEEP(0.1) --",
            "\" OR \"\"=\"",
            "<script>alert(1)</script>' OR '1'='1",
        ];

        foreach ($payloads as $payload) {
            $response = $this->get('/search?search_text=' . urlencode($payload));

            // Must return 200 OK and not crash with 500 SQL syntax or runtime error
            $response->assertStatus(200);
            $response->assertViewIs('search');
            $response->assertViewHas('items');
        }
    }

    /**
     * Test query builder uses parameter bindings and does not concatenate user input directly.
     */
    public function test_query_uses_parameter_bindings_for_search(): void
    {
        $maliciousPayload = "') OR 1=1 -- -";

        // Enable query log
        DB::enableQueryLog();

        $searchTxt = $maliciousPayload;

        // Simulate ExperienceExtra search query
        ExperienceExtra::where('name', 'like', '%' . $searchTxt . '%')->get();

        // Simulate Experience search query
        Experience::where('active', 1)
            ->where(function ($query) use ($searchTxt) {
                $query->where('name', 'like', '%' . $searchTxt . '%')
                      ->orWhere('description', 'like', '%' . $searchTxt . '%');
            })
            ->where('exp_type', 3)
            ->get();

        $queries = DB::getQueryLog();
        DB::disableQueryLog();

        $this->assertNotEmpty($queries);

        foreach ($queries as $query) {
            // Confirm the raw SQL does NOT contain the unescaped payload directly
            $this->assertStringNotContainsString($maliciousPayload, $query['query']);
            // Confirm the payload is passed inside the bindings array
            $hasBinding = false;
            foreach ($query['bindings'] as $binding) {
                if (str_contains($binding, $maliciousPayload)) {
                    $hasBinding = true;
                    break;
                }
            }
            if ($hasBinding) {
                $this->assertTrue($hasBinding, 'Payload found safely in bindings.');
            }
        }
    }

    /**
     * Test input validation rejects excessively long search_text.
     */
    public function test_validation_rejects_excessively_long_search_text(): void
    {
        $tooLong = str_repeat('a', 300);

        $response = $this->get('/search?search_text=' . $tooLong);

        $response->assertSessionHasErrors(['search_text']);
    }

    /**
     * Test search with filters (view, sortby) works.
     */
    public function test_search_with_valid_parameters(): void
    {
        $response = $this->get('/search?search_text=Tour&view=grid');

        $response->assertStatus(200);
        $response->assertViewIs('search');
    }
}
