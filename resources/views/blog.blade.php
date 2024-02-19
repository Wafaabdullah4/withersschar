<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--
    - primary meta tags
  -->
    <title>Blogy - Hey, we’re Blogy. See our thoughts, stories and ideas.</title>
    <meta name="title" content="Blogy - Hey, we’re Blogy. See our thoughts, stories and ideas.">
    <meta name="description" content="This is a blog html template made by codewithsadee">

    <!--
    - favicon
  -->
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

    <!--
    - custom css link
  -->
    <link rel="stylesheet" href="{{ asset('blogy-master/assets/css/style.css') }}">

    <!--
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap" rel="stylesheet">

</head>

<body>

    <!--
    - #HEADER
  -->

    <header class="header section" data-header>
        <div class="container">

            <a href="#" class="logo">
                <img src="public\blogy-master\assets\images\quantumread.png" alt="">
                <img src="{{ asset('quantumread.png') }}" alt="">
            </a>

            <nav class="navbar" data-navbar>
                <ul class="navbar-list">

                    <li class="navbar-item">
                        <a href="#" class="navbar-link hover:underline" data-nav-link>Home</a>
                    </li>

                    <li class="navbar-item">
                        <a href="#" class="navbar-link hover:underline" data-nav-link>Recent Post</a>
                    </li>

                    <li class="navbar-item">
                        <a href="#" class="navbar-link hover:underline" data-nav-link>Membership</a>
                    </li>

                </ul>
            </nav>

            <div class="wrapper">

                <button class="search-btn" aria-label="search" data-search-toggler>
                    <ion-icon name="search-outline" aria-hidden="true"></ion-icon>

                    <span class="span">Search</span>
                </button>

                <button class="nav-toggle-btn" aria-label="toggle menu" data-nav-toggler>
                    <span class="span one"></span>
                    <span class="span two"></span>
                    <span class="span three"></span>
                </button>

                <a href="#" class="btn">Join</a>

            </div>

        </div>
    </header>





    <!--
    - #SEARCH BAR
  -->

    <div class="search-bar" data-search-bar>

        <div class="input-wrapper">
            <input type="search" name="search" placeholder="Search" class="input-field">

            <button class="search-close-btn" aria-label="close search bar" data-search-toggler>
                <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
            </button>

        </div>

        <p class="search-bar-text">Please enter at least 3 characters</p>

    </div>

    <div class="overlay" data-overlay data-search-toggler></div>





    <main>
        <article>

            <!--
        - #HERO
      -->

            <section class="section hero" aria-label="home">
                <div class="container">

                    <h1 class="h1 hero-title">
                        <strong class="strong">Hey, Ini Quantum Read.</br></strong> Tempat dimana anda dapat mencari
                        berbagai karya tulisan.
                    </h1>

                    <div class="wrapper">

                        <form action="" class="newsletter-form">
                            <input type="email" name="email_address" placeholder="Your email address"
                                class="email-field">

                            <button type="submit" class="btn">Subscribe</button>
                        </form>

                        <p class="newsletter-text">
                            Get the email newsletter and unlock access to members-only content and updates
                        </p>

                    </div>

                </div>
            </section>





            <!--
        - #FEATURED POST
      -->
            <section class="section featured" aria-label="featured post">
                <div class="container">

                    <p class="section-subtitle">
                        Mulai dengan kami <strong class="strong">anda akan mendapatkan pengalaman yang menarik</strong>
                    </p>

                    <ul class="has-scrollbar">
                        @foreach ($blogs as $post)
                            <li class="scrollbar-item">
                                <div class="blog-card">

                                    <figure class="card-banner img-holder" style="--width: 500; --height: 600;">
                                        <img src="{{ asset('storage/' . $post->image) }}" width="500" height="600"
                                            loading="lazy" alt="{{ $post->title }}" class="img-cover">

                                        <ul class="avatar-list absolute">
                                            @if ($post->user->image)
                                                <li class="avatar-item">
                                                    <a href="#" class="avatar img-holder"
                                                        style="--width: 100; --height: 100;">
                                                        <img src="{{ asset('storage/' . $post->user->image) }}"
                                                            alt="User Image" width="100" height="100"
                                                            loading="lazy" class="img-cover">
                                                    </a>
                                                </li>
                                            @else
                                                <span class="avatar-item">Tidak ada gambar</span>
                                            @endif

                                        </ul>
                                    </figure>

                                    <div class="card-content">

                                        <ul class="card-meta-list">
                                            @foreach ($categories as $category)
                                                <li>
                                                    <a href="#" class="card-tag">{{ $category->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>

                                        <h3 class="h4">
                                            <a href="#"
                                                class="card-title hover:underline">{{ $post->title }}</a>
                                        </h3>

                                        <p class="card-text">{{ Str::words($post->content, 30) }}</p>

                                    </div>

                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </section>





            <!--
        - #RECENT POST
      -->

            <section class="section recent" aria-label="recent post">
                <div class="container">

                    <div class="title-wrapper">

                        <h2 class="h2 section-title">
                            Lebih banyak pengalaman lainnya <strong class="strong">ditulis akhir-akhir ini</strong>
                        </h2>


                        <div class="top-author">
                            <ul class="avatar-list">
                                @foreach ($user as $author)
                                    <li class="avatar-item">
                                        <a href="#" class="avatar large img-holder"
                                            style="--width: 100; --height: 100;">
                                            <img src="{{ asset('storage/' . $author->image) }}" width="100"
                                                height="100" alt="top author" class="img-cover">
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                            <span class="span">Temui penulis top kami</span>
                        </div>

                    </div>

                    <ul class="grid-list">
                        @foreach ($blogs as $blog)
                            <li>
                                <div class="blog-card">

                                    <figure class="card-banner img-holder" style="--width: 550; --height: 660;">
                                        <img src="{{ asset('storage/' . $blog->image) }}" width="550"
                                            height="660" loading="lazy" alt="Blog Image" class="img-cover">

                                        <ul class="avatar-list absolute">

                                            @if ($blog->user->image)
                                                <li class="avatar-item">
                                                    <a href="#" class="avatar img-holder"
                                                        style="--width: 100; --height: 100;">
                                                        <img src="{{ asset('storage/' . $blog->user->image) }}"
                                                            alt="User Image" width="100" height="100"
                                                            loading="lazy" class="img-cover">
                                                    </a>
                                                </li>
                                            @else
                                                <span class="avatar-item">Tidak ada gambar</span>
                                            @endif


                                        </ul>

                                    </figure>

                                    <div class="card-content">

                                        <ul class="card-meta-list">
                                            @foreach ($categories as $category)
                                                <li>
                                                    <a href="#" class="card-tag">{{ $category->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>

                                        <h3 class="h4">
                                            <a href="#" class="card-title hover:underline">
                                                {{ $blog->title }}
                                            </a>
                                        </h3>

                                        <p class="card-text">
                                            {{ Str::words($blog->content, 5) }}
                                        </p>

                                    </div>

                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <button class="btn">Load more</button>

                </div>
            </section>





            <!--
        - #RECOMMENDED POST
      -->

            <section class="section recommended" aria-label="recommended post">
                <div class="container">

                    <p class="section-subtitle">
                        <strong class="strong">Recommended</strong>
                    </p>

                    <ul class="grid-list">

                        <li>
                            <div class="blog-card">

                                <figure class="card-banner img-holder" style="--width: 300; --height: 360;">
                                    <img src="./assets/images/recommended-1.jpg" width="300" height="360"
                                        loading="lazy"
                                        alt="The trick to getting more done is to have the freedom to roam around "
                                        class="img-cover">

                                    <ul class="avatar-list absolute">

                                        <li class="avatar-item">
                                            <a href="#" class="avatar img-holder"
                                                style="--width: 100; --height: 100;">
                                                <img src="./assets/images/author-5.jpg" width="100" height="100"
                                                    loading="lazy" alt="Author" class="img-cover">
                                            </a>
                                        </li>

                                        <li class="avatar-item">
                                            <a href="#" class="avatar img-holder"
                                                style="--width: 100; --height: 100;">
                                                <img src="./assets/images/author-2.jpg" width="100" height="100"
                                                    loading="lazy" alt="Author" class="img-cover">
                                            </a>
                                        </li>

                                    </ul>
                                </figure>

                                <div class="card-content">

                                    <h3 class="h5">
                                        <a href="#" class="card-title hover:underline">
                                            The trick to getting more done is to have the freedom to roam around
                                        </a>
                                    </h3>

                                </div>

                            </div>
                        </li>

                        <li>
                            <div class="blog-card">

                                <figure class="card-banner img-holder" style="--width: 300; --height: 360;">
                                    <img src="./assets/images/recommended-2.jpg" width="300" height="360"
                                        loading="lazy" alt="Every day, in every city and town across the country "
                                        class="img-cover">

                                    <ul class="avatar-list absolute">

                                        <li class="avatar-item">
                                            <a href="#" class="avatar img-holder"
                                                style="--width: 100; --height: 100;">
                                                <img src="./assets/images/author-3.jpg" width="100" height="100"
                                                    loading="lazy" alt="Author" class="img-cover">
                                            </a>
                                        </li>

                                    </ul>
                                </figure>

                                <div class="card-content">

                                    <h3 class="h5">
                                        <a href="#" class="card-title hover:underline">
                                            Every day, in every city and town across the country
                                        </a>
                                    </h3>

                                </div>

                            </div>
                        </li>

                        <li>
                            <div class="blog-card">

                                <figure class="card-banner img-holder" style="--width: 300; --height: 360;">
                                    <img src="./assets/images/recommended-3.jpg" width="300" height="360"
                                        loading="lazy" alt="I work best when my space is filled with inspiration "
                                        class="img-cover">

                                    <ul class="avatar-list absolute">

                                        <li class="avatar-item">
                                            <a href="#" class="avatar img-holder"
                                                style="--width: 100; --height: 100;">
                                                <img src="./assets/images/author-1.jpg" width="100" height="100"
                                                    loading="lazy" alt="Author" class="img-cover">
                                            </a>
                                        </li>

                                    </ul>
                                </figure>

                                <div class="card-content">

                                    <h3 class="h5">
                                        <a href="#" class="card-title hover:underline">
                                            I work best when my space is filled with inspiration
                                        </a>
                                    </h3>

                                </div>

                            </div>
                        </li>

                        <li>
                            <div class="blog-card">

                                <figure class="card-banner img-holder" style="--width: 300; --height: 360;">
                                    <img src="./assets/images/recommended-4.jpg" width="300" height="360"
                                        loading="lazy" alt="I have my own definition of minimalism "
                                        class="img-cover">

                                    <ul class="avatar-list absolute">

                                        <li class="avatar-item">
                                            <a href="#" class="avatar img-holder"
                                                style="--width: 100; --height: 100;">
                                                <img src="./assets/images/author-4.jpg" width="100" height="100"
                                                    loading="lazy" alt="Author" class="img-cover">
                                            </a>
                                        </li>

                                        <li class="avatar-item">
                                            <a href="#" class="avatar img-holder"
                                                style="--width: 100; --height: 100;">
                                                <img src="./assets/images/author-3.jpg" width="100" height="100"
                                                    loading="lazy" alt="Author" class="img-cover">
                                            </a>
                                        </li>

                                    </ul>
                                </figure>

                                <div class="card-content">

                                    <h3 class="h5">
                                        <a href="#" class="card-title hover:underline">
                                            I have my own definition of minimalism
                                        </a>
                                    </h3>

                                </div>

                            </div>
                        </li>

                        <li>
                            <div class="blog-card">

                                <figure class="card-banner img-holder" style="--width: 300; --height: 360;">
                                    <img src="./assets/images/recommended-5.jpg" width="300" height="360"
                                        loading="lazy" alt="Change your look and your attitude " class="img-cover">

                                    <ul class="avatar-list absolute">

                                        <li class="avatar-item">
                                            <a href="#" class="avatar img-holder"
                                                style="--width: 100; --height: 100;">
                                                <img src="./assets/images/author-6.jpg" width="100" height="100"
                                                    loading="lazy" alt="Author" class="img-cover">
                                            </a>
                                        </li>

                                    </ul>
                                </figure>

                                <div class="card-content">

                                    <h3 class="h5">
                                        <a href="#" class="card-title hover:underline">
                                            Change your look and your attitude
                                        </a>
                                    </h3>

                                </div>

                            </div>
                        </li>

                        <li>
                            <div class="blog-card">

                                <figure class="card-banner img-holder" style="--width: 300; --height: 360;">
                                    <img src="./assets/images/recommended-6.jpg" width="300" height="360"
                                        loading="lazy" alt="The difference is quality " class="img-cover">

                                    <ul class="avatar-list absolute">

                                        <li class="avatar-item">
                                            <a href="#" class="avatar img-holder"
                                                style="--width: 100; --height: 100;">
                                                <img src="./assets/images/author-3.jpg" width="100" height="100"
                                                    loading="lazy" alt="Author" class="img-cover">
                                            </a>
                                        </li>

                                    </ul>
                                </figure>

                                <div class="card-content">

                                    <h3 class="h5">
                                        <a href="#" class="card-title hover:underline">
                                            The difference is quality
                                        </a>
                                    </h3>

                                </div>

                            </div>
                        </li>

                    </ul>

                </div>
            </section>





            <!--
        - #NEWSLETTER
      -->

            <section class="section newsletter">

                <h2 class="h2 section-title">
                    Subscribe to <strong class="strong">new posts</strong>
                </h2>

                <form action="" class="newsletter-form">
                    <input type="email" name="email_address" placeholder="Your email address" required
                        class="email-field">

                    <button type="submit" class="btn">Subscribe</button>
                </form>

            </section>

        </article>
    </main>





    <!--
    - #FOOTER
  -->

    <footer class="footer">
        <div class="container">

            <div class="footer-top section">

                <div class="footer-brand">

                    <a href="#" class="logo">
                        <img src="public\blogy-master\assets\images\quantumread.png" alt="">
                        <img src="{{ asset('quantumread.png') }}" alt="">
                    </a>
                    </a>

                    <p class="footer-text">
                        Subscribe untuk <strong class="strong">postingan baru</strong> </p>

                </div>

                <ul class="footer-list">

                    <li>
                        <p class="h5">Social</p>
                    </li>

                    <li class="footer-list-item">
                        <ion-icon name="logo-facebook"></ion-icon>

                        <a href="#" class="footer-link hover:underline">Facebook</a>
                    </li>

                    <li class="footer-list-item">
                        <ion-icon name="logo-twitter"></ion-icon>

                        <a href="#" class="footer-link hover:underline">Twitter</a>
                    </li>

                    <li class="footer-list-item">
                        <ion-icon name="logo-pinterest"></ion-icon>

                        <a href="#" class="footer-link hover:underline">Pinterest</a>
                    </li>

                    <li class="footer-list-item">
                        <ion-icon name="logo-vimeo"></ion-icon>

                        <a href="#" class="footer-link hover:underline">Vimeo</a>
                    </li>

                </ul>

                <ul class="footer-list">

                    <li>
                        <p class="h5">About</p>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Style Guide</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Features</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Contact</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">404</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Privacy Policy</a>
                    </li>

                </ul>

                <ul class="footer-list">

                    <li>
                        <p class="h5">Features</p>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Upcoming Events</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Blog & News</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Features</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">FAQ Question</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Testimonial</a>
                    </li>

                </ul>

                <ul class="footer-list">

                    <li>
                        <p class="h5">Membership</p>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Account</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Membership</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Subscribe</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Tags</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Authors</a>
                    </li>

                </ul>

            </div>

            <div class="section footer-bottom">

                <p class="copyright">
                    &copy; Blogy 2022. Published by <a href="#"
                        class="copyright-link hover:underline">codewithsadee</a>.
                </p>

            </div>

        </div>
    </footer>






    <!--
    - custom js link
  -->
    <script src="{{ asset('blogy-master/assets/js/script.js') }}" defer></script>

    <!--
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
