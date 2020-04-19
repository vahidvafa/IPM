@extends('master')
@section('header')

    <style>

        /* Useful Classes */
        .xy-center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .transition {
            transition: all 650ms ease-in-out;
        }
        .r-3-2 {
            width: 100%;
            padding-bottom: 66.667%;
            background-color: #ddd;
        }

        .image-holder {
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }

        /* Main Styles */
        .gallery-wrapper {
            position: relative;
            overflow: hidden;
        }

        .gallery {
            position: relative;
            white-space: nowrap;
            font-size: 0;
        }

        .item-wrapper {
            cursor: pointer;
            width: 23%; /* arbitrary value */
            display: inline-block;
            background-color: white;
        }

        .gallery-item { opacity: 0.5; }
        .gallery-item.active { opacity: 1; }

        .controls {
            font-size: larger;
            border-top: none;
        }
        .move-btn {
            display: inline-block;
            width: 50%;
            border: solid 1px #372b7d;
            color: #372b7d;
            background-color: transparent;
            padding: 0.2em 1.5em;
        }

        .move-btn.left  { cursor: w-resize; }
        .move-btn.right { cursor: e-resize; }


    </style>



@stop

@section('content')

    <div class="container mb-5 mt-5">

        <div class="feature" >
            <figure class="featured-item image-holder r-3-2 transition"></figure>
        </div>

        <div class="gallery-wrapper">
            <div class="gallery">
                @for($i=1 ; $i<=10 ; $i++)
                <div class="item-wrapper">
                    <figure class="gallery-item image-holder r-3-2 @if($i==1) active @else transition @endif"></figure>
                </div>
                    @endfor
            </div>
        </div>

        <div class="controls">
            <button class="move-btn right col-5 ">&rarr;</button>
            <button class="move-btn left col-5">&larr;</button>
        </div>

    </div>

    <script>
        var gallery = document.querySelector('.gallery');
        var galleryItems = document.querySelectorAll('.gallery-item');
        var numOfItems = gallery.children.length;
        var itemWidth = 23; // percent: as set in css

        var featured = document.querySelector('.featured-item');

        var leftBtn = document.querySelector('.move-btn.left');
        var rightBtn = document.querySelector('.move-btn.right');
        var leftInterval;
        var rightInterval;

        var scrollRate = 0.1;
        var left;

        function selectItem(e) {
            if (e.target.classList.contains('active')) return;

            featured.style.backgroundImage = e.target.style.backgroundImage;

            for (var i = 0; i < galleryItems.length; i++) {
                if (galleryItems[i].classList.contains('active'))
                    galleryItems[i].classList.remove('active');
            }

            e.target.classList.add('active');
        }

        function galleryWrapLeft() {
            var first = gallery.children[0];
            gallery.removeChild(first);
            gallery.style.left = -itemWidth + '%';
            gallery.appendChild(first);
            gallery.style.left = '0%';
        }

        function galleryWrapRight() {
            var last = gallery.children[gallery.children.length - 1];
            gallery.removeChild(last);
            gallery.insertBefore(last, gallery.children[0]);
            gallery.style.left = '-23%';
        }

        function moveLeft() {
            left = left || 0;

            leftInterval = setInterval(function() {
                gallery.style.left = left + '%';

                if (left > -itemWidth) {
                    left -= scrollRate;
                } else {
                    left = 0;
                    galleryWrapLeft();
                }
            }, 1);
        }

        function moveRight() {
            //Make sure there is element to the leftd
            if (left > -itemWidth && left < 0) {
                left = left  - itemWidth;

                var last = gallery.children[gallery.children.length - 1];
                gallery.removeChild(last);
                gallery.style.left = left + '%';
                gallery.insertBefore(last, gallery.children[0]);
            }

            left = left || 0;

            leftInterval = setInterval(function() {
                gallery.style.left = left + '%';

                if (left < 0) {
                    left += scrollRate;
                } else {
                    left = -itemWidth;
                    galleryWrapRight();
                }
            }, 1);
        }

        function stopMovement() {
            clearInterval(leftInterval);
            clearInterval(rightInterval);
        }

        leftBtn.addEventListener('mouseenter', moveLeft);
        leftBtn.addEventListener('mouseleave', stopMovement);
        rightBtn.addEventListener('mouseenter', moveRight);
        rightBtn.addEventListener('mouseleave', stopMovement);


        //Start this baby up
        (function init() {
            var images = [
                "img/image_archive/1.jpeg",
                "img/image_archive/2.jpeg",
                "img/image_archive/3.jpeg",
                "img/image_archive/4.jpeg",
                "img/image_archive/5.jpeg",
                "img/image_archive/6.jpeg",
                "img/image_archive/7.jpeg",
                "img/image_archive/8.jpeg",
                "img/image_archive/9.jpeg",
                "img/image_archive/10.jpeg"
            ];

            //Set Initial Featured Image
            featured.style.backgroundImage = 'url(' + images[0] + ')';

            //Set Images for Gallery and Add Event Listeners
            for (var i = 0; i < galleryItems.length; i++) {
                galleryItems[i].style.backgroundImage = 'url(' + images[i] + ')';
                galleryItems[i].addEventListener('click', selectItem);
            }
        })();
    </script>
@stop