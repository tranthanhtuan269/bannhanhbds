<style>
    @media (min-width: 1300px) {
        .mr-rank-home {
            transform: translateX(-110px);
            /* margin-right: 110px; */
        }
    }

    @media all and (min-width: 992px) {
        .navbar .nav-item .dropdown-menu{  display:block; opacity: 0;  visibility: hidden; transition:.3s; margin-top:0;  }
        .navbar .nav-item:hover .nav-link{ color: #fff;  }
        .navbar .dropdown-menu.fade-down{ top:80%; transform: rotateX(-75deg); transform-origin: 0% 0%; }
        .navbar .dropdown-menu.fade-up{ top:180%;  }
        .navbar .nav-item:hover .dropdown-menu{ transition: .3s; opacity:1; visibility:visible; top:100%; transform: rotateX(0deg); }
    }

    @media (min-width: 1200px) {
        .find-novel .item-content .des,
        .detail-rank .tab-content .item-rank .info .des {
            -webkit-line-clamp: 3;
        }

        .detail-author-template .des {
            -webkit-line-clamp: 3;
        }

        .mr-rank-home {
            transform: translateX(-80px);
            /* margin-right: 80px; */
        }

    }


    @media (min-width: 992px) and (max-width: 1200px) {
        .mr-rank-home {
            transform: translateX(-40px);
            /* margin-right: 40px; */
        }
    }

    @media (min-width: 992px) {
        .list-hot-group.small {
            display:grid;
            grid-template-columns:1fr 1fr;
            grid-gap:32 0px;
            column-count:unset;
        }

        .book-thum {
            height:400px;
            position: relative;
            transform: perspective(300px) rotateY(-3deg);
            -moz-perspective: 300px;
            -moz-transform: rotateY(-3deg);
            -webkit-transform: perspective(300) rotateY(-3deg);
            box-shadow: 5px 5px 20px #333;
        }

        .pr-36 {
            padding-right: 48px;
        }

        .book-thum>img {
            height:100%;
        }

        .book-thum::before {
            width: 100%;
            left: 6.5%;
            background-color: #000;
        }

        .book-thum::after {
            width: 4%;
            left: 100%;
            background-color: #EFEFEF;
            box-shadow: inset 0px 0px 5px #aaa;
            transform: perspective(300px) rotateY(20deg);
            -moz-transform: rotateY(20deg);
            -webkit-transform: perspective(300) rotateY(20deg);
        }

        .book-thum::after,
        .book-thum::before {
            position: absolute;
            top: 2%;
            height:96%;
            content: ' ';
            z-index: -1;
        }

        .footer-fixed {
            position:fixed;
            bottom:0;
            left:0;
            right:0
        }

        .detail-novel .see-more.none-lg {
            display: none;
        }

        .find-novel .item-rank .name {
            line-height:23px
        }

        .detail-rank .tab-content .item-rank .rank {
            font-size:16px
        }

        .list-hot-group {
            column-gap:40px
        }

        .font-20 {
            font-size:20px
        }
    }

    @media (min-width: 800px) and (max-width:1200px){
        .slide-good-novel.owl-theme .owl-dots .owl-dot span,
        .slide-read-novel.owl-theme .owl-dots .owl-dot span {
            width:30px;
        }
        .slide-good-novel.owl-theme .owl-dots,
        .slide-read-novel.owl-theme .owl-dots {
            top:-67px
        }
        .slide-good-novel.owl-theme .owl-nav,
        .slide-read-novel.owl-theme .owl-nav
        {
            top: -57px;
        }
    }

    @media(max-width:991px) {
        .list-search {
            grid-template-columns:22% 22% 22% 22% ;
            grid-gap:20px 4%
        }

        .img-3-4-lg {
            aspect-ratio :3/4
        }
        .list-hot-group {
            column-count:1
        }

        .ml-star {
            margin-left:22px;
        }

        .tab-content-ranking {
            display:grid;
            grid-template-columns:1fr ;
            grid-gap:0px
        }

        .mr-rank-home {
            transform: translateX(-180px);
            /* margin-right: 180px; */
        }

        .novel-full .list-full {
            grid-template-columns:1fr 1fr 1fr 1fr 1fr;
        }

        #home .box-1 .new-release .content .top .thum {
            aspect-ratio:3/4
        }

        #home .box-1 .new-release .content {
            height:300px;
        }

        .home.novel-full .list-full a.card-novel:nth-child(10),
        .home.novel-full .list-full a.card-novel:nth-child(9){
            display:block;
        }

        .list-type-pick {
            top:58px
        }

        .detail-novel .thum {
            height: auto !important;;
            width: 60% !important;
            aspect-ratio:4/5;
            margin:auto;
        }


        .detail-novel .content .top h3.name {
            font-size:28px;
            line-height:34px;
        }

        .read-novel .name-chap {
            -webkit-line-clamp: 2;
            line-height:28px
        }

        .read-novel .box-name {
            line-height:30px
        }

        #home .box-1 .new-release .title h3,
        #home .box-2 .top .title h3,
        .box-new-novel .title h3,
        .novel-full .title h3,
        .detail-rank .title h3,
        .detail-novel .title ,
        .read-novel .title,
        .find-novel .title,
        .comment-box .title,
        .detail-author .title,
        #home .box-1 .new-release .title{
            font-size:20px!important;
            line-height:26px
        }

        .book-thum {
            display:flex
        }

        .book-thum>img {
            width: 60%!important;
            margin: auto;
            aspect-ratio: 4/5;
            border-radius:8px;
        }
    }

    @media(max-width:767px) {

        .detail-author .title-author {
            flex-direction:column;
            align-items: flex-start!important;
        }

        .read-novel .direc-chap .direc-chap-btn {
            min-width:100px
        }

        .read-novel .direc-chap.active {
            grid-template-columns:1fr 2fr 1fr;
        }

        .slide-good-novel.owl-theme .owl-dots,
        .slide-read-novel.owl-theme .owl-dots {
            position:unset;
            margin-top: 8px;
        }

        .slide-good-novel.owl-theme .owl-dots .owl-dot span,
        .slide-read-novel.owl-theme .owl-dots .owl-dot span {
            width:30px;
        }

        .slide-good-novel.owl-theme .owl-nav,
        .slide-read-novel.owl-theme .owl-nav
        {
            top: unset;
            bottom:-4px;
            right:50%;
            transform:translateX(50%)
        }

        .detail-author .title {
            font-size: 18px;
            font-weight:550
        }

        .detail-author .right-side {
            font-size:16px!important;
            margin-left: 0!important;
            margin-top: 20px;
        }

        .detail-author .control-detail .box-control {
            left:0;
        }

        .novel-full .list-full,
        .box-new-novel .content .list-right {
            grid-template-columns:1fr 1fr 1fr 1fr ;
        }

        .home.novel-full .list-full a.card-novel:nth-child(10),
        .home.novel-full .list-full a.card-novel:nth-child(9),
        .box-new-novel .content .list-right a.card-novel:nth-child(10),
        .box-new-novel .content .list-right a.card-novel:nth-child(9){
            display:none;
        }

        .box-new-novel .zoom-novel .bottom ,
        #home .box-1 .new-release .content .bottom{
            font-size: 13px;
        }

        .mr-rank-home {
            transform: translateX(-80px);
            /* margin-right: 80px; */
        }
    }

    @media (max-width: 575px) {
        .row.row-read {
            margin:0
        }
        .row.row-read .col-read {
            padding:0
        }
        #good-novel,#reading-novel {
            height:310px!important;
        }
        .slide-new-novel {
            height:340px!important;
        }
        .list-search {
            grid-template-columns: 30% 30% 30%;
            grid-gap:16px 5%
        }

        .read-novel .direc-chap .direc-chap-btn {
            min-width:78px
        }

        .list-type-pick {
            top: 55px;
        }

        .scroll-top>img {
            width: 38px;
            height: 38px;
        }

        .scroll-top {
            right: 10px;
        }

        .home-read-novel::before,
        .img-home {
            width:16px;
            height: 16px;
        }

        .box-read-content {
            margin-top: 0px;
        }

        #home .box-1 .new-release .title h3,
        #home .box-2 .top .title h3,
        .box-new-novel .title h3,
        .novel-full .title h3,
        .detail-rank .title h3,
        .detail-novel .title ,
        .read-novel .title,
        .find-novel .title,
        .comment-box .title,
        .detail-author .title,
        #home .box-1 .new-release .title{
            font-size:18px!important;
            line-height:26px
        }

        .header .navbar-nav .nav-link {
            font-size:14px
        }

        #home .box-1 .new-release .content {
            padding-bottom: 18px;
            padding-top: 18px;
        }

        ul.list-picked li {
            margin-right: 8px!important;
        }

        .ml-star {
            margin-left:16px;
        }

        .mr-rank-home {
            transform: translateX(-40px);
            /* margin-right: 40px; */
        }

        #home .box-1 .new-release .content {
            height:320px
        }

        #home .box-1 .new-release .content .top .thum {
            height:170px
        }

        .owl-theme .owl-dots .owl-dot:hover span {
            background-color: #D6D6D6
        }

        .owl-theme .owl-dots .owl-dot.active span {
            background-color: #2280ec
        }

        .slide-new-novel.owl-theme .owl-dots {
            bottom: 5px;
        }

        .detail-novel .see-more.none-sm {
            display: none;
        }

        .logo-header {
            width:130px;
            height:40px;
        }

        .logo-footer {
            width:200px;
            height:66px;
        }

        .name {
            font-size:14px;
        }

        body {
            font-size:12px
        }

        .btn-next-read , .btn-next-good, .btn-prev-read, .btn-prev-good {
            display:none;
        }

        #home .nav-tabs .nav-item .nav-link {
            display:flex;
            justify-content:center;
            align-items: center;
        }

        #home .nav-tabs .nav-item {
            width:50%;
        }

        #home .nav-tabs .nav-item .nav-link {
            font-size:18px;
        }

        .top-rank .name, .top-rank .title, .box-new-novel .zoom-novel .name,
        #home .new-release .name {
            font-size:16px;
        }

        .detail-rank .tab-content .item-rank .rank,
        #home .box-2 .top-rank .content .item .info .rank,
        .detail-rank .tab-content .item-rank .rank-123,
        #home .box-2 .top-rank .content .item .info .rank.rank-123 {
            width: 24px;
            height: 25px;
        }

        .detail-rank .tab-content .item-rank .rank-123,
        #home .box-2 .top-rank .content .item .info .rank.rank-123 {
            height:34px;
        }


        .header .dropdown-menu.dropdown-menu-type.show {
            display: grid;
            grid-template-columns:1fr 1fr;
        }

        .box-new-novel .content .list-right {
            grid-template-columns:30% 30% 30%;
            margin-top: 24px;
            grid-gap:16px 5%;
        }

        .box-new-novel .content .list-right a.card-novel:last-child {
            display:none;
        }

        .novel-full .list-full  {
            grid-template-columns:30% 30% 30% ;
            grid-gap:16px 5%
        }

        #home .tab-novel .nav-link, .detail-rank .content .tab-rank .nav-link, {
            font-size:20px;
        }

        .title-tab .tab-rank .nav-link {
            font-size:18px;
            padding:8px 0;
        }


        #home .box-2 .top-rank .content .item>img {
            max-width:90%
        }

        .item-list-novel .des,
        .detail-rank .info .des,
        .detail-rank .info .description {
            font-size:12px
        }

        .find-novel .item-list-novel .item-content div.d-flex.justify-content-between,
        .find-novel .item-list-novel .item-content div.text-3-line {
            margin-top: 12px!important;
            font-size:12px;
        }

        .detail-rank .info img.br-6 {
            aspect-ratio : 2/3
        }

        .text-chap {
            font-size:16px;
        }

        .detail-novel .see-more .open-des, .detail-novel .see-more .close-des {
            font-size:12px
        }


        .newest-chap .text-chap {
            -webkit-line-clamp:2
        }

        .detail-novel .author-status {
            flex-direction:column;
        }

        .detail-novel ul.box-chap {
            column-count:1;
        }

        .detail-novel .thum {
            aspect-ratio : 3/4
        }

        .detail-novel .content .top .btn.btn-read {
            min-width: 240px ! important;
        }

        .detail-novel .content .top h3.name {
            font-size:20px;
            margin-bottom: 0;
        }

        .detail-author .right-side {
            margin-top: 12px;
        }

        .detail-author .right-side img.full,
        .detail-author .right-side img.not-full {
            height:30px;
            width:50px
        }

        .detail-author .control-detail .box-control {
            left:0;
            min-width: unset;
            width:320px!important
        }

        .detail-author .control-detail .box-control .btn-submit {
            font-size:16px;
            min-width:200px
        }

        .detail-author .right-side td span {
            margin-left: 4px!important;
            font-size:14px
        }

        .detail-author .control-detail .box-control tr {
            grid-template-columns: 50% auto;
            grid-gap: 20px 4px;
        }

        .detail-author .list_story_author .item-content {
            font-size:12px
        }

        .detail-author .list_story_author .item-content .des {
            -webkit-line-clamp:3;
            margin-top: 8px!important;
        }

        .detail-author .list_story_author .item-content .mt-4 {
            margin-top: 12px!important;
        }

        .detail-author .content .item-author, .find-novel .item-list-novel {
            grid-gap:30px 16px
        }

        .detail-author .label-full span {
            width:130px
        }

        #action {
            display: none;
        }

        #action-mobile {
            display: block;
        }

        .list-action-mb.have-border {
            border-top: 1px solid rgba(0, 0, 0, 0.2)
        }

        #action-mobile.theme-7 .list-action-mb.have-border {
            border-top: 1px solid rgba(255,255,255,0.5)
        }

        .box-read-content {
            transform: translateY(0)
        }

        .read-novel .box-read {
            padding:10px 8px;
            border-radius:10px
        }

        .container.my-container {
            padding:0 6px!important
        }

        .home.novel-full .list-full a.card-novel:nth-child(9),
        .box-new-novel .content .list-right a.card-novel:nth-child(9){
            display:block;
        }

        .detail-rank .tab-content .item-rank .info {
            grid-gap:16px
        }

        .result-search .name {
            line-height:20px
        }

        #home .box-2 .top-rank .content .item .info {
            grid-gap:4px;
            grid-template-columns:26px auto
        }

        header .btn-light {
            width:88px;
            height:29px;
            padding-right: 2px;
        }

        header .btn-light span {
            width: 49px;
            height:18px;
            word-break: keep-all!important;
        }

        .noti-null {
            height:260px;
            display: flex;
            justify-content:center;
            align-items: center;
        }

        /* ---------------------------------action_mobile------------------------------------ */

    }

    @media (max-width:460px) {
        #home .slide-good-novel a img.thum, #home .slide-read-novel img.thum {
            height:180px;
        }

        .slide-good-novel .item .name, .slide-read-novel .item .name {
            line-height:19px;
        }

        .top-rank .name {
            font-size:16px;
        }

        #home .box-2 .top-rank .content .item .info .content{
            font-size:14px;
        }

        .mr-rank-home {
            transform: translateX(-10px);
            /* margin-right: 10px; */
        }

        .ml-star {
            margin-left:12px;
        }

        #home .box-1 .new-release .content .top .thum {
            height:130px
        }
    }

    @media (max-width:400px) {
        #home .nav-tabs .nav-item .nav-link,
        #home .box-1 .new-release .title h3,
        #home .box-2 .top .title h3,
        .box-new-novel .title h3,
        .novel-full .title h3,
        .detail-rank .title h3,
        .detail-novel .title ,
        .read-novel .title,
        .find-novel .title,
        .comment-box .title {
            font-size:18px!important;
        }

        .mr-rank-home {
            transform: translateX(0px);
            /* margin-right: 0px; */
        }

        #home .nav-tabs .nav-item .nav-link {
            display:flex;
            justify-content:center;
            align-items: center;
        }

        .find-novel .name, {
            -webkit-line-clamp: 2;
        }

    }

    @media (max-width:380px) {
        .find-novel .des,
        .detail-author .list_story_author .item-content .des {
            display:none;
        }

        .detail-rank .tab-content .item-rank .info .des {
            display:none;
        }

        .detail-rank .info img.br-6 {
            aspect-ratio:3/4
        }

        .find-novel .item-list-novel .d-flex.justify-content-between.mt-3,
        .detail-author .list_story_author .item-content .d-flex.justify-content-between.mt-3  {
            flex-direction:column;
        }

        .find-novel .item-list-novel .d-flex.justify-content-between.mt-3 .author,
        .detail-author .list_story_author .item-content .d-flex.justify-content-between.mt-3 .author{
            margin-bottom: 10px;
        }

        .find-novel .item-list-novel .d-flex.justify-content-between.mt-3 .star {
            margin-left: 0!important;
        }

        .title-tab .tab-rank .nav-link {
            font-size:16px;
        }

        #home .nav-tabs .nav-item .nav-link {
            font-size:18px
        }

        .my-flex {
            flex-direction:column;
        }

        .ml-star {
            margin-left:0px;
            margin-top: 10px;
        }


    }

    @media (max-width:350px) {
        .detail-author .right-side {
            flex-direction:column;
        }

        .detail-author .right-side .control-detail {
            margin-bottom: 12px;
        }
    }


</style>
