<div class="categories_area pt-85 mb-150">
    <div class="container-fluid">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="section-wrapper text-center mb-35">
                <h2 class="section-title">Khám phá sản phẩm</h2>
                <p>Khám phá shop quần áo Store cùng những sản phẩm mới “siêu chất”</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="categories__tab">
                    <ul class="nav nav-tabs justify-content-center mb-55" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab"  aria-selected="true">All SHoes</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab"  aria-selected="false">Men’s</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab"  aria-selected="false">WoMen’s</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#kidss" type="button" role="tab"  aria-selected="false">Trẻ em</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        @include('site.home.product_discovery.all_products')
                        @include('site.home.product_discovery.men_products')
                        @include('site.home.product_discovery.women_products')
                        @include('site.home.product_discovery.kids')


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
