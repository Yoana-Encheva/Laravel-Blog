<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blog</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Heebo:400,700|Open+Sans:400,700');

        :root {
            --color: #3c3163;
            --transition-time: 0.5s;
        }

        * {
            box-sizing: border-box;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            max-height: 580px;
            display: flex;
            flex-wrap: wrap;
        }

        li {
            list-style: none
        }

        /*HEADER*/

        header {
            color: black;
            background-size: cover;
            background-position: center;
            display: flex;
            font-weight: bold
        }

        #navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        #navbar p {
            font-size: 30px
        }

        #navigation-links {
            display: flex;
        }

        #navigation-links li {
            margin-left: 40px;
            font-size: 17px;
        }

        #navigation-links li a {
            text-decoration: none;
            color: inherit;
        }

        #navigation-links li a:hover {
            border-bottom: 2px solid #e27025;
            padding-bottom: 10px;
        }

        #headings {
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
        }

        #headings h1 {
            font-size: 45px;
            font-weight: 700;
            margin: 20px 0;
        }

        .orange-btn {
            background: #e27025;
            font-size: 18px;
            text-transform: uppercase;
            align-content: center;
            color: white;
            padding: 15px;
            transition: 0.3s;
            width: fit-content;
        }

        .orange-btn:hover {
            background: transparent;
            cursor: pointer;
            color: #e27025;
            border: 1px solid #e27025;
            transition: 0.3s;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Open Sans';
            background: #fafafa;
            /* display: flex;
            flex-direction: column; */
            /* width: 100%; */
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .cards-wrapper {
            justify-content: center;
            /* padding: 4rem; */
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap
        }

        .card {
            font-family: 'Heebo';
            --bg-filter-opacity: 0.5;
            background-image: linear-gradient(rgba(0, 0, 0, var(--bg-filter-opacity)), rgba(0, 0, 0, var(--bg-filter-opacity))),
                var(--bg-img);
            height: 20em;
            width: 20em;
            font-size: 1.5em;
            color: white;
            border-radius: 1em;
            padding: 1em;
            /*margin: 2em;*/
            display: flex;
            align-items: center;
            background-size: cover;
            background-position: center;
            box-shadow: 0 0 5em -1em black;
            transition: all, var(--transition-time);
            position: relative;
            overflow: hidden;
            border: 10px solid #ccc;
            text-decoration: none;
        }

        .card:hover {
            transform: rotate(0);
        }

        .card h1 {
            margin: 0;
            font-size: 1.5em;
            line-height: 1.2em;
        }

        .card p {
            font-size: 0.75em;
            font-family: 'Open Sans';
            margin-top: 0.5em;
            line-height: 2em;
        }

        .card .tags {
            display: flex;
        }

        .card .tags .tag {
            font-size: 0.75em;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 0.3rem;
            padding: 0 0.5em;
            margin-right: 0.5em;
            line-height: 1.5em;
            transition: all, var(--transition-time);
        }

        .card:hover .tags .tag {
            background: var(--color);
            color: white;
        }

        .card .date {
            position: absolute;
            top: 0;
            right: 0;
            font-size: 0.75em;
            padding: 1em;
            line-height: 1em;
            opacity: .8;
        }

        .card:before,
        .card:after {
            content: '';
            transform: scale(0);
            transform-origin: top left;
            border-radius: 50%;
            position: absolute;
            left: -50%;
            top: -50%;
            z-index: -5;
            transition: all, var(--transition-time);
            transition-timing-function: ease-in-out;
        }

        .card:before {
            background: #ddd;
            width: 250%;
            height: 250%;
        }

        .card:after {
            background: white;
            width: 200%;
            height: 200%;
        }

        .card:hover {
            color: var(--color);
        }

        .card:hover:before,
        .card:hover:after {
            transform: scale(1);
        }

        .card-grid-space .num {
            font-size: 3em;
            margin-bottom: 1.2rem;
            margin-left: 1rem;
        }

        .info {
            font-size: 1.2em;
            display: flex;
            padding: 1em 3em;
            height: 3em;
        }

        .info img {
            height: 3em;
            margin-right: 0.5em;
        }

        .info h1 {
            font-size: 2em;
            font-weight: normal;
            margin: 0 auto
        }

        /* MEDIA QUERIES */
        @media screen and (max-width: 1285px) {
            .cards-wrapper {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media screen and (max-width: 900px) {
            .cards-wrapper {
                grid-template-columns: 1fr;
            }

            .info {
                justify-content: center;
            }

            .card-grid-space .num {
                /margin-left: 0;
                /text-align: center;
            }
        }

        @media screen and (max-width: 500px) {
            .cards-wrapper {
                padding: 4rem 2rem;
            }

            .card {
                max-width: calc(100vw - 4rem);
            }
        }

        @media screen and (max-width: 450px) {
            .info {
                display: block;
                text-align: center;
            }

            .info h1 {
                margin: 0;
            }
        }
    </style>
</head>

@include('common.header')

<body>
    <div class="container">
        <section class="cards-wrapper">
            @forelse ($posts as $post)

            @include('_post')

            @empty
            <p class="p-4">No posts yet.</p>
            @endforelse

        </section>
    </div>
</body>

</html>