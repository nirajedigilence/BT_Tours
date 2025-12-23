@extends('layouts.front')

@section('content')

<div class="notIndexContainer">

    <div class="accountContainer">
        <div class="accountRow">

            <div class="leftCol">
                @include('partials.super_user_left',['open_menu' => 'database', 'sub_marked' => 'hotels']);
            </div>

            <div class="account_main_content">

                <div class="left_column">

                    <div class="main_content_nav">

                        <div class="filters">

                            <div class="filters_dropdown">

                                <div class="cta">
                                    Filters
                                </div>

                                <div class="dropdown">

                                    <div class="heading">
                                        Filter By
                                    </div>

                                    <div class="options">

                                        <div class="option">

                                            <div class="column checkbox">
                                                <input type="checkbox" id="checkbox_1" checked>
                                                <label for="checkbox_1"></label>
                                            </div>

                                            <div class="label">
                                                70% +
                                            </div>

                                        </div>

                                        <div class="option">

                                            <div class="column checkbox">
                                                <input type="checkbox" id="checkbox_2" checked>
                                                <label for="checkbox_2"></label>
                                            </div>

                                            <div class="label">
                                                80% +
                                            </div>

                                        </div>

                                        <div class="option">

                                            <div class="column checkbox">
                                                <input type="checkbox" id="checkbox_3" checked>
                                                <label for="checkbox_3"></label>
                                            </div>

                                            <div class="label">
                                                90% +
                                            </div>

                                        </div>

                                        <div class="option">

                                            <div class="column checkbox">
                                                <input type="checkbox" id="checkbox_4" checked>
                                                <label for="checkbox_4"></label>
                                            </div>

                                            <div class="label">
                                                Total %
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <ul class="active_filters">
                                <li class="label">Active filters:</li>
                                <li>Current bookings <span>x</span></li>
                                <li>Main contact <span>x</span></li>
                            </ul>

                        </div>

                        <div class="search">

                            <div class="search__input">
                                <input type="text" placeholder="Search">
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>

                        </div>

                    </div>

                    <div class="left_column__list">

                        <div class="left_column__list_row header">

                            <div class="left_column__list_column w_25">
                                Collaborator
                            </div>

                            <div class="left_column__list_column w_15">
                                Current bookings
                            </div>

                            <div class="left_column__list_column w_15">
                                Main contact
                            </div>

                            <div class="left_column__list_column w_15">
                                Contact number
                            </div>

                            <div class="left_column__list_column w_15">
                                Email
                            </div>

                            <div class="left_column__list_column w_15 centered">
                                Index Score
                            </div>

                        </div>

                        <div class="left_column__list_row active">

                            <div class="left_column__list_column w_25 bold">
                                Barnes Coaches
                            </div>

                            <div class="left_column__list_column w_15">
                                15
                            </div>

                            <div class="left_column__list_column w_15">
                                Michael Johnson (Manager)
                            </div>

                            <div class="left_column__list_column w_15">
                                dir: 07393726131
                                <span class="line_break">m: 0739367777</span>
                            </div>

                            <div class="left_column__list_column w_15">
                                michael@barnes.com
                            </div>

                            <div class="left_column__list_column w_15 centered">
                                <strong class="green">92%</strong>
                            </div>

                        </div>

                        <div class="left_column__list_row">

                            <div class="left_column__list_column w_25 bold">
                                Belle
                            </div>

                            <div class="left_column__list_column w_15">
                                15
                            </div>

                            <div class="left_column__list_column w_15">
                                Michael Johnson (Manager)
                            </div>

                            <div class="left_column__list_column w_15">
                                dir: 07393726131
                                <span class="line_break">m: 0739367777</span>
                            </div>

                            <div class="left_column__list_column w_15">
                                michael@barnes.com
                            </div>

                            <div class="left_column__list_column w_15 centered">
                                <strong class="green">92%</strong>
                            </div>

                        </div>

                        <div class="left_column__list_row">

                            <div class="left_column__list_column w_25 bold">
                                Belle
                            </div>

                            <div class="left_column__list_column w_15">
                                15
                            </div>

                            <div class="left_column__list_column w_15">
                                Michael Johnson (Manager)
                            </div>

                            <div class="left_column__list_column w_15">
                                dir: 07393726131
                                <span class="line_break">m: 0739367777</span>
                            </div>

                            <div class="left_column__list_column w_15">
                                michael@barnes.com
                            </div>

                            <div class="left_column__list_column w_15 centered">
                                <strong class="green">92%</strong>
                            </div>

                        </div>

                        <div class="left_column__list_row">

                            <div class="left_column__list_column w_25 bold">
                                Belle
                            </div>

                            <div class="left_column__list_column w_15">
                                15
                            </div>

                            <div class="left_column__list_column w_15">
                                Michael Johnson (Manager)
                            </div>

                            <div class="left_column__list_column w_15">
                                dir: 07393726131
                                <span class="line_break">m: 0739367777</span>
                            </div>

                            <div class="left_column__list_column w_15">
                                michael@barnes.com
                            </div>

                            <div class="left_column__list_column w_15 centered">
                                <strong class="green">92%</strong>
                            </div>

                        </div>

                        <div class="left_column__list_row">

                            <div class="left_column__list_column w_25 bold">
                                Belle
                            </div>

                            <div class="left_column__list_column w_15">
                                15
                            </div>

                            <div class="left_column__list_column w_15">
                                Michael Johnson (Manager)
                            </div>

                            <div class="left_column__list_column w_15">
                                dir: 07393726131
                                <span class="line_break">m: 0739367777</span>
                            </div>

                            <div class="left_column__list_column w_15">
                                michael@barnes.com
                            </div>

                            <div class="left_column__list_column w_15 centered">
                                <strong class="green">92%</strong>
                            </div>

                        </div>

                        <div class="left_column__list_row">

                            <div class="left_column__list_column w_25 bold">
                                Belle
                            </div>

                            <div class="left_column__list_column w_15">
                                15
                            </div>

                            <div class="left_column__list_column w_15">
                                Michael Johnson (Manager)
                            </div>

                            <div class="left_column__list_column w_15">
                                dir: 07393726131
                                <span class="line_break">m: 0739367777</span>
                            </div>

                            <div class="left_column__list_column w_15">
                                michael@barnes.com
                            </div>

                            <div class="left_column__list_column w_15 centered">
                                <strong class="green">92%</strong>
                            </div>

                        </div>

                        <div class="left_column__list_row">

                            <div class="left_column__list_column w_25 bold">
                                Belle
                            </div>

                            <div class="left_column__list_column w_15">
                                15
                            </div>

                            <div class="left_column__list_column w_15">
                                Michael Johnson (Manager)
                            </div>

                            <div class="left_column__list_column w_15">
                                dir: 07393726131
                                <span class="line_break">m: 0739367777</span>
                            </div>

                            <div class="left_column__list_column w_15">
                                michael@barnes.com
                            </div>

                            <div class="left_column__list_column w_15 centered">
                                <strong class="green">92%</strong>
                            </div>

                        </div>

                        <div class="left_column__list_row">

                            <div class="left_column__list_column w_25 bold">
                                Belle
                            </div>

                            <div class="left_column__list_column w_15">
                                15
                            </div>

                            <div class="left_column__list_column w_15">
                                Michael Johnson (Manager)
                            </div>

                            <div class="left_column__list_column w_15">
                                dir: 07393726131
                                <span class="line_break">m: 0739367777</span>
                            </div>

                            <div class="left_column__list_column w_15">
                                michael@barnes.com
                            </div>

                            <div class="left_column__list_column w_15 centered">
                                <strong class="green">92%</strong>
                            </div>

                        </div>

                        <div class="left_column__list_row">

                            <div class="left_column__list_column w_25 bold">
                                Belle
                            </div>

                            <div class="left_column__list_column w_15">
                                15
                            </div>

                            <div class="left_column__list_column w_15">
                                Michael Johnson (Manager)
                            </div>

                            <div class="left_column__list_column w_15">
                                dir: 07393726131
                                <span class="line_break">m: 0739367777</span>
                            </div>

                            <div class="left_column__list_column w_15">
                                michael@barnes.com
                            </div>

                            <div class="left_column__list_column w_15 centered">
                                <strong class="green">92%</strong>
                            </div>

                        </div>

                        <div class="left_column__list_row">

                            <div class="left_column__list_column w_25 bold">
                                Belle
                            </div>

                            <div class="left_column__list_column w_15">
                                15
                            </div>

                            <div class="left_column__list_column w_15">
                                Michael Johnson (Manager)
                            </div>

                            <div class="left_column__list_column w_15">
                                dir: 07393726131
                                <span class="line_break">m: 0739367777</span>
                            </div>

                            <div class="left_column__list_column w_15">
                                michael@barnes.com
                            </div>

                            <div class="left_column__list_column w_15 centered">
                                <strong class="green">92%</strong>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="right_column">

                    <div class="intro">

                        <div class="heading mb_0">
                            BARNES COACHES
                        </div>

                        <div class="percentage">
                            92%
                        </div>

                        <div class="contact_info">

                            <div class="block">
                                
                                <div class="sub_heading">
                                    Main Contact
                                </div>

                                <div>
                                    <strong>Michael Johnson (Manager)</strong>
                                </div>

                            </div>

                            <div class="block">
                                
                                <div class="sub_heading">
                                    Contact number
                                </div>

                                <div>
                                    direct: <span class="orange">07393726131</span>
                                </div>

                                <div>
                                    main: <span class="orange">07393726131</span>
                                </div>

                            </div>

                            <div class="block">
                                
                                <div class="sub_heading">
                                    Email
                                </div>

                                <div>
                                    <a href="mailto:michael@barnes.com" class="email">
                                        michael@barnes.com
                                    </a>
                                </div>

                            </div>

                            <div class="block">
                                
                                <div class="sub_heading">
                                    Total Bookings
                                </div>

                                <div>
                                    <strong>253</strong>
                                </div>

                            </div>

                            <div class="block">
                                
                                <div class="sub_heading">
                                    Current bookings
                                </div>

                                <div>
                                    <strong>15</strong>
                                </div>

                            </div>

                            <div class="block">
                               
                               <div class="sub_heading">
                                    Outstanding alerts
                                </div>

                                <div>
                                    <span class="orange">1 to go</span>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="icon_ctas">

                        <a href="#" class="cta">
                            <i class="fas fa-sticky-note"></i>
                        </a>

                        <a href="#" class="cta">
                            <i class="fas fa-edit"></i>
                        </a>

                    </div>

                    <div class="footer_links">

                        <a href="#" class="cta">
                            Open Profile
                        </a>

                        <a href="#" class="cta">
                            Current Bookings
                        </a>

                        <a href="#" class="cta">
                            Completed Bookings
                        </a>

                        <a href="#" class="cta">
                            View Analytics
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="account_popup">

        <div class="popup_content">

            <div class="heading">
                Edit Profile
            </div>

            <div class="description">
                Here you can edit internal information about this collaborator
            </div>

            <div class="sections">

                <div class="section w_50">

                    <div class="sub_heading">
                        General Information
                    </div>

                    <div class="form">

                        <div class="fieldset">
                            <label>About</label>
                            <textarea type="text" rows="5" />Do not own the ships, charter from XYZ Ship Builders Inc., offer high-end 4-star cruises but not quite 5-star level (even on self-styled 5-star vessels)”,</textarea>
                        </div>

                        <div class="grouped">

                            <div class="fieldset">
                                <label>Address</label>
                                <input type="text" value="contact@barnescoaches.com">
                            </div>

                            <div class="fieldset">
                                <label>Main phone number</label>
                                <input type="text" value="contact@barnescoaches.com">
                            </div>

                        </div>

                        <div class="grouped">

                            <div class="fieldset">
                                <label>General email</label>
                                <input type="text" value="contact@barnescoaches.com">
                            </div>

                            <div class="fieldset">
                                <label>Industry Associations</label>
                                <input type="text" value="contact@barnescoaches.com">
                            </div>

                        </div>

                    </div>

                </div>

                <div class="section w_25 gallery">

                    <div class="sub_heading">
                        Ship Gallery
                    </div>

                    <p>
                        Ship Pictures (e.g. ship interior or of the ship)
                    </p>

                    <ul class="gallery__list">

                        <li>
                            <a href="#">
                                Vivatiara.jpeg <i class="far fa-times-circle"></i>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Vivatreasures.jpeg <i class="far fa-times-circle"></i>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Vivainspire.jpeg <i class="far fa-times-circle"></i>
                            </a>
                        </li>

                    </ul>

                    <a href="#" class="add_image_cta">
                        Add image
                    </a>

                </div>

                <div class="section w_25 gallery">

                    <div class="sub_heading">
                        Map Gallery
                    </div>

                    <p>
                        Pictures of maps (e.g. routes)
                    </p>

                    <ul class="gallery__list">

                        <li>
                            <a href="#">
                                Map.jpeg <i class="far fa-times-circle"></i>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                amsttoamst.jpeg <i class="far fa-times-circle"></i>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                amsttobasel.jpeg <i class="far fa-times-circle"></i>
                            </a>
                        </li>

                    </ul>

                    <a href="#" class="add_image_cta">
                        Add image
                    </a>

                </div>

                <div class="section w_100">

                    <div class="sub_heading">
                        Ships
                    </div>

                    <div class="sections">

                        <div class="section w_50">

                            <a href="#" class="remove_ship_cta">
                                <i class="fas fa-times"></i>
                            </a>

                            <div class="form">

                                <div class="grouped">

                                    <div class="fieldset half">
                                        <label>Ship name</label>
                                        <input type="text" value="contact@barnescoaches.com">
                                    </div>

                                    <div class="fieldset quarter">
                                        <label>Star rating</label>
                                        <select>
                                            <option value="">1 star</option>
                                            <option value="">2 stars</option>
                                            <option value="">3 stars</option>
                                            <option value="">4 stars</option>
                                            <option value="" selected>5 stars</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="fieldset">
                                    <label>Routes</label>

                                    <div class="list">

                                        <div class="list__item">
                                            <input type="text" value="Regensburg - Passau - Linz">
                                            <a href="#" class="remove_cta">
                                                <i class="far fa-times-circle"></i>
                                            </a>
                                        </div>

                                        <div class="list__item">
                                            <input type="text" value="Danube - Melk - Durnstein - Vienna - Vienna">
                                            <a href="#" class="remove_cta">
                                                <i class="far fa-times-circle"></i>
                                            </a>
                                        </div>

                                        <a href="#" class="add_cta">
                                            add route
                                        </a>

                                    </div>
                                </div>

                                <div class="fieldset half">
                                    <label>Cabin types</label>
                                    <input type="text" value="Diamond, Ruby, Emerald">
                                </div>

                                <div class="fieldset">
                                    <label>Deck plan</label>

                                    <div class="download">

                                        <div class="file">
                                            <i class="fas fa-file-pdf"></i>
                                            deckviva.pdf
                                        </div>

                                        <div class="ctas">
                                            <a href="#" class="cta">view</a>
                                            <a href="#" class="cta">re-upload</a>
                                        </div>

                                    </div>
                                </div>

                                <div class="grouped">

                                    <div class="fieldset">
                                        <label>Built</label>
                                        <input type="text" value="2015">
                                    </div>

                                    <div class="fieldset">
                                        <label>Refurbished</label>
                                        <input type="text" value="2018">
                                    </div>

                                    <div class="fieldset">
                                        <label>Passengers</label>
                                        <input type="text" value="142">
                                    </div>

                                    <div class="fieldset">
                                        <label>Staff to guest rato</label>
                                        <input type="text" value="1 to 3">
                                    </div>

                                    <div class="fieldset">
                                        <label>No Cabins</label>
                                        <input type="text" value="1 to 3">
                                    </div>

                                </div>

                                <div class="fieldset half">
                                    <label>Coach parking</label>
                                    <input type="text" value="No">
                                </div>

                                <div class="fieldset">
                                    <label>Gallery link</label>
                                    <input type="text" value="https://www.viva-cruises.com/en/ships/ms-viva-treasures?hsLang=en">
                                </div>

                            </div>

                        </div>

                        <div class="section w_50">

                            <a href="#" class="remove_ship_cta">
                                <i class="fas fa-times"></i>
                            </a>

                            <div class="form">

                                <div class="grouped">

                                    <div class="fieldset half">
                                        <label>Ship name</label>
                                        <input type="text" value="contact@barnescoaches.com">
                                    </div>

                                    <div class="fieldset quarter">
                                        <label>Star rating</label>
                                        <select>
                                            <option value="">1 star</option>
                                            <option value="">2 stars</option>
                                            <option value="">3 stars</option>
                                            <option value="">4 stars</option>
                                            <option value="" selected>5 stars</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="fieldset">
                                    <label>Routes</label>

                                    <div class="list">

                                        <div class="list__item">
                                            <input type="text" value="Regensburg - Passau - Linz">
                                            <a href="#" class="remove_cta">
                                                <i class="far fa-times-circle"></i>
                                            </a>
                                        </div>

                                        <div class="list__item">
                                            <input type="text" value="Danube - Melk - Durnstein - Vienna - Vienna">
                                            <a href="#" class="remove_cta">
                                                <i class="far fa-times-circle"></i>
                                            </a>
                                        </div>

                                        <a href="#" class="add_cta">
                                            add route
                                        </a>

                                    </div>
                                </div>

                                <div class="fieldset half">
                                    <label>Cabin types</label>
                                    <input type="text" value="Diamond, Ruby, Emerald">
                                </div>

                                <div class="fieldset">
                                    <label>Deck plan</label>

                                    <div class="download">

                                        <div class="file">
                                            <i class="fas fa-file-pdf"></i>
                                            deckviva.pdf
                                        </div>

                                        <div class="ctas">
                                            <a href="#" class="cta">view</a>
                                            <a href="#" class="cta">re-upload</a>
                                        </div>

                                    </div>
                                </div>

                                <div class="grouped">

                                    <div class="fieldset">
                                        <label>Built</label>
                                        <input type="text" value="2015">
                                    </div>

                                    <div class="fieldset">
                                        <label>Refurbished</label>
                                        <input type="text" value="2018">
                                    </div>

                                    <div class="fieldset">
                                        <label>Passengers</label>
                                        <input type="text" value="142">
                                    </div>

                                    <div class="fieldset">
                                        <label>Staff to guest rato</label>
                                        <input type="text" value="1 to 3">
                                    </div>

                                    <div class="fieldset">
                                        <label>No Cabins</label>
                                        <input type="text" value="1 to 3">
                                    </div>

                                </div>

                                <div class="fieldset half">
                                    <label>Coach parking</label>
                                    <input type="text" value="No">
                                </div>

                                <div class="fieldset">
                                    <label>Gallery link</label>
                                    <input type="text" value="https://www.viva-cruises.com/en/ships/ms-viva-treasures?hsLang=en">
                                </div>

                            </div>

                        </div>

                        <div class="section w_50">

                            <a href="#" class="remove_ship_cta">
                                <i class="fas fa-times"></i>
                            </a>

                            <div class="form">

                                <div class="grouped">

                                    <div class="fieldset half">
                                        <label>Ship name</label>
                                        <input type="text" value="contact@barnescoaches.com">
                                    </div>

                                    <div class="fieldset quarter">
                                        <label>Star rating</label>
                                        <select>
                                            <option value="">1 star</option>
                                            <option value="">2 stars</option>
                                            <option value="">3 stars</option>
                                            <option value="">4 stars</option>
                                            <option value="" selected>5 stars</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="fieldset">
                                    <label>Routes</label>

                                    <div class="list">

                                        <div class="list__item">
                                            <input type="text" value="Regensburg - Passau - Linz">
                                            <a href="#" class="remove_cta">
                                                <i class="far fa-times-circle"></i>
                                            </a>
                                        </div>

                                        <div class="list__item">
                                            <input type="text" value="Danube - Melk - Durnstein - Vienna - Vienna">
                                            <a href="#" class="remove_cta">
                                                <i class="far fa-times-circle"></i>
                                            </a>
                                        </div>

                                        <a href="#" class="add_cta">
                                            add route
                                        </a>

                                    </div>
                                </div>

                                <div class="fieldset half">
                                    <label>Cabin types</label>
                                    <input type="text" value="Diamond, Ruby, Emerald">
                                </div>

                                <div class="fieldset">
                                    <label>Deck plan</label>

                                    <div class="download">

                                        <div class="file">
                                            <i class="fas fa-file-pdf"></i>
                                            deckviva.pdf
                                        </div>

                                        <div class="ctas">
                                            <a href="#" class="cta">view</a>
                                            <a href="#" class="cta">re-upload</a>
                                        </div>

                                    </div>
                                </div>

                                <div class="grouped">

                                    <div class="fieldset">
                                        <label>Built</label>
                                        <input type="text" value="2015">
                                    </div>

                                    <div class="fieldset">
                                        <label>Refurbished</label>
                                        <input type="text" value="2018">
                                    </div>

                                    <div class="fieldset">
                                        <label>Passengers</label>
                                        <input type="text" value="142">
                                    </div>

                                    <div class="fieldset">
                                        <label>Staff to guest rato</label>
                                        <input type="text" value="1 to 3">
                                    </div>

                                    <div class="fieldset">
                                        <label>No Cabins</label>
                                        <input type="text" value="1 to 3">
                                    </div>

                                </div>

                                <div class="fieldset half">
                                    <label>Coach parking</label>
                                    <input type="text" value="No">
                                </div>

                                <div class="fieldset">
                                    <label>Gallery link</label>
                                    <input type="text" value="https://www.viva-cruises.com/en/ships/ms-viva-treasures?hsLang=en">
                                </div>

                            </div>

                        </div>

                    </div>

                    <button type="submit">
                        Add ship
                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

<script>
    var updated = 0;
    $(document).ready(function(){

        $(".hasAccSubmenu .menuLink").bind("click", function(e){
            e.preventDefault();
            if ($(this).parent().hasClass("open")) {
                $(this).parent().removeClass("open");
                $(this).parent().children(".submenuHolder").slideUp();
            }else {
                $(this).parent().addClass("open");
                $(this).parent().children(".submenuHolder").slideDown();
            }
        });

    });
</script>

@endsection