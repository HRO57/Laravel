<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <!-- Add your CSS link here -->
    <link href="{{ asset('css/landing-page.css') }}" rel="stylesheet">
    <!-- ----------Bootstrap stylesheet--------- -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Add the Font Awesome stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

     <!-- --------tailwind css------ -->
     <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    

</head>
<body>
                          {{----------------------- nav bar ---------------------}}
                <div>
                    <nav class="bg-blue-100">
                        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                        <div class="relative flex items-center justify-between h-16">
                            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                            <!-- Mobile menu button-->
                            <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                                <span class="sr-only">Open main menu</span>
                                <!--
                                Icon when menu is closed.
                    
                                Heroicon name: outline/menu
                    
                                Menu open: "hidden", Menu closed: "block"
                                -->
                                <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                                <!--
                                Icon when menu is open.
                    
                                Heroicon name: outline/x
                    
                                Menu open: "block", Menu closed: "hidden"
                                -->
                                <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                            </div>
                                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                                    {{-- <div class="flex-shrink-0 flex items-center">
                                    <img class="lg:block h-8 w-auto" src="icons/Group 33072.png" alt="Workflow">
                                </div> --}}
                                <div class="hidden sm:block sm:ml-6">
                                    <div class="flex space-x-4 ">
                                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                        <a href="#" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Home</a>
                            
                                        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Products</a>
                            
                                        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Abou Us</a>
                            
                                        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                                        <div class="login-registration-buttons">

                                            <a href="{{ route('auth.login') }} "class="btn btn-primary">Login</a>
                                            <a href="{{ route('auth.registration') }}" class="btn btn-secondary">Register</a>

                                        </div>
                                    </div>
                            </div>
                        </div>
                        
                    </div>
                </nav>
            </div>

                                                        {{----------------------- End nav bar ---------------------}}
        @extends('products.layout')

        @section('content')
            
    <div class="container">

                                                        {{------------  Search bar -------------}}

                        <form method="GET" action="{{ route('products.index') }}" accept-charset="UTF-8" role="search" >
                            <div class="table-search">   
                                <div>
                                    <button class="search-select">
                                    Search Product 
                                    </button>
                                </div>
                                <div class="relative">
                                    <input class="search-input" type="text" name="search" placeholder="Search product..." value="{{ request('search') }}">
                                </div>
                            </div>
                        </form>

        {{-- <div class="icons-container">
            <!-- Add login icon here (you can replace "#" with the actual login route) -->
            <a class="icons-container-btn" href="#"><i class="fas fa-user"></i> Login</a>
            <!-- Add add-to-cart icon here (you can replace "#" with the actual add-to-cart route) -->
            <a  class="icons-container-btn" href="#"><i class="fas fa-cart-plus"></i> Add to Cart</a>
        </div> --}}

                                <!-------------- Hero Banner ---------------------->

                                <section class="hero-banner">
                                    <div class="hero-content">
                                        <h2>Welcome to Our G-tech Store</h2>
                                        <p>Discover amazing products at great prices!</p>
                                    </div>
                                </section>

                                <!--------------End Hero Banner ---------------------->


                                <!-------------- All product ---------------------->

        <h1 class="product-class">All Products</h1>
            <div class="product-grid">
                @foreach($products as $product)
                    <div class="product-card">
                        <div class="product-image">
                            <img src=" {{ asset('image/' . $product->image) }}" alt="Product Image" >
                        </div>
                        <div class="product-details">
                            <h3>{{ $product->name }}</h3>
                            <p class="price">Price: {{ $product->price }} BDT</p>
                            <p class="discount-price">Discount Price: {{ $product->discount_price }} BDT</p>
                            <p class="category">Category: {{ $product->category }}</p>
                            <p class="btn-holder">
                                <a href="{{ route('add_to_cart', $product->id) }}" class="btn btn-primary btn-block text-center" role="button">Add to cart</a> 
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

                                    <!-------------- All product ---------------------->


                                    <!------------------ Content Sections ------------------>

          <section class="content-section">
            <div class="row">
                <div class="col-md-12">
                    <h2>Leading Computer, Laptop & Gaming PC Retail & Online Shop in Bangladesh</h2> <br>
                    <p>Technology has become a part of our daily lives, and we depend on tech products daily for a vast portion of our lives. There is hardly a home in Bangladesh without a tech product. This is where we come in. G-tech Ltd. started as a Tech Product Shop in March 2007. We focus on giving the best customer service in Bangladesh, following our motto of “Customer Comes First.” This is why G-tech is the most trusted computer shop in Bangladesh today, capturing the loyalty of a large customer base. After a long 16-year journey, G-tech Ltd. was certified with the renowned "ISO 9001:2015 certification" as a recognition for the best Quality Control Management System. As an ISO-certified organization, G-tech Ltd. is now up to the international standards that specify a Quality Management System (QMS). This Certification denotes that the organization strictly maintains all sorts of regulatory requirements to provide customers with products and services of a global standard.</p>
                </div>
            </div>
        </section>
          <section class="content-section">
            <div class="row">
                <div class="col-md-12">
                    <h2>Latest PC Building Components in Bangladesh</h2> <br>
                    <p>Are you looking for the best PC building components shop? G-Tech Computers, Bangladesh's leading computer component provider, offers an extensive assortment of cutting-edge PC components that cater to the diverse requirements and financial constraints of tech enthusiasts. Whether on a tight budget or seeking high-end solutions, G-Tech Computers has got you covered. We offer a wide selection of high-quality components, knowledgeable staff, and an easy online ordering system for your convenience. Create your dream machine with RYANS shop, Bangladesh's best PC building components store. Visit us today and achieve lightning-fast performance, stunning visuals, and a build you can be proud of.</p>
                </div>
            </div>
        </section>

                                    <!------------------ End Content Sections ------------------>



                                    <!------------------ Second Content Sections ------------------>

        <section class="shadow">
            <div class="fifth-container">
                <div class="bonusbox">
                    <h1>700k</h1>
                    <small>Youtube Subscribers</small>
                </div>
                <div class="bonusbox">
                    <h1>2.5m</h1>
                    <small>Instagram Followers</small>
                </div>
                <div class="bonusbox">
                    <h1>100k</h1>
                    <small>Dribbble Shot Like</small>
                </div>
            </div>
        </section>

                                    <!------------------ End Second Content Sections ------------------>

                                
                                    <!------------------ Address Content Sections ------------------>

        <section>
            <div class="product-grid">
                <div class="address-details">
                    <h5>IDB BHABAN</h5>
                    <p >123/5 BCS Computer City, Agargaon Dhaka.</p>
                    <p >Tel: 09604442121 (Sales), 01755513935 (Service)</p>
                    <p >Map Link: https://ryans.id/IDB-Bhaban-Branch</p>
                </div>
                <div class="address-details">
                    <h5>BANANI</h5>
                    <p >41 Kamal Ataturk Avenue, Dhaka.</p>
                    <p >Tel: 09604442121 (Sales), 01755513935 (Service)</p>
                    <p >Map Link: https://ryans.id/IDB-Bhaban-Branch</p>
                </div>
                <div class="address-details">
                    <h5>UTTARA-1</h5>
                    <p >36 Sonargaon Janapath (Beside Uttara Adhunik Medical College & Hospital), 2nd Floor, Sector 9, Uttara, Dhaka.</p>
                    <p >Tel: 09604442121 (Sales), 01755513935 (Service)</p>
                    <p >Map Link: https://ryans.id/IDB-Bhaban-Branch</p>
                </div>
                <div class="address-details">
                    <h5>AGRABAD</h5>
                    <p >472 Sheikh Mujib Road, Chattogram.</p>
                    <p >Tel: 09604442121 (Sales), 01755513935 (Service)</p>
                    <p >Map Link: https://ryans.id/IDB-Bhaban-Branch</p>
                </div>
                <div class="address-details">
                    <h5>KHULNA</h5>
                    <p >Naushin Tower, 11 KDA Avenue.</p>
                    <p >Tel: 09604442121 (Sales), 01755513935 (Service)</p>
                    <p >Map Link: https://ryans.id/IDB-Bhaban-Branch</p>
                </div>
                <div class="address-details">
                    <h5>RAJSHAHI</h5>
                    <p >3/7 Jamal Super Market, 97 Shaheb Bazar.</p>
                    <p >Tel: 09604442121 (Sales), 01755513935 (Service)</p>
                    <p >Map Link: https://ryans.id/IDB-Bhaban-Branch</p>
                </div>
                <div class="address-details">
                    <h5>MYMENSINGH</h5>
                    <p >11 C.K Ghosh Road.</p>
                    <p >Tel: 09604442121 (Sales), 01755513935 (Service)</p>
                    <p >Map Link: https://ryans.id/IDB-Bhaban-Branch</p>
                </div>
            </div>
        </section>

                                <!------------------ End Address Content Sections ------------------>
                                
                                <!------------------ Footer Sections ------------------>

    <footer>
        © 2023 <span class="footer-text-color">  G-tech </span>
        <p>BE HUMBLE</p>
    </footer>
    @endsection
</body>
</html>
