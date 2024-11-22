<html lang="en">
<!-- Mirrored from zoyothemes.com/silva/html/analytics by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Nov 2024 03:54:30 GMT -->
<!-- Added by HTTrack -->

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
    <meta charset="utf-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Zoyothemes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- App CSS -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style">

    <!-- Icons CSS -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <!-- vendor css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style id="apexcharts-css">
    @keyframes opaque {
        0% {
            opacity: 0
        }

        to {
            opacity: 1
        }
    }

    @keyframes resizeanim {

        0%,
        to {
            opacity: 0
        }
    }

    .apexcharts-canvas {
        position: relative;
        user-select: none
    }

    .apexcharts-canvas ::-webkit-scrollbar {
        -webkit-appearance: none;
        width: 6px
    }

    .apexcharts-canvas ::-webkit-scrollbar-thumb {
        border-radius: 4px;
        background-color: rgba(0, 0, 0, .5);
        box-shadow: 0 0 1px rgba(255, 255, 255, .5);
        -webkit-box-shadow: 0 0 1px rgba(255, 255, 255, .5)
    }

    .apexcharts-inner {
        position: relative
    }

    .apexcharts-text tspan {
        font-family: inherit
    }

    .legend-mouseover-inactive {
        transition: .15s ease all;
        opacity: .2
    }

    .apexcharts-legend-text {
        padding-left: 15px;
        margin-left: -15px;
    }

    /* .apexcharts-series-collapsed {
            <style id="apexcharts-css">@keyframes opaque {
                0% {
                    opacity: 0
                }

                to {
                    opacity: 1
                }
            } */

    @keyframes resizeanim {

        0%,
        to {
            opacity: 0
        }
    }

    .coloryellow {
        color: yellow;
        /* font-size: 20px; */
    }

    .wrap {
        white-space: nowrap;
    }

    .colortext {
        color: #4a5a6b !important;
    }

    .colorcircle {
        width: 30px;
        height: 30px;
        /* background-color: #042d51; */
        border-radius: 50%;
        display: inline-block;
        /* Đảm bảo phần tử giữ hình dạng khối nhỏ */
        border: 2px solid #fff;
        /* Tùy chọn: viền trắng để nổi bật */
        vertical-align: middle;
    }

    .custom-col1 {
        width: 15%;
    }

    .custom-col2 {
        width: 17%;
    }

    .custom-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        /* Cắt và căn chỉnh hình ảnh để vừa với khung */
        border-radius: 5px;
        /* Bo góc, nếu cần */
        display: block;
        /* Đảm bảo hình ảnh là block để tránh lỗi layout */
        margin: 0 auto;
        /* Căn giữa hình ảnh trong thẻ div */
    }


    .aưddress-column {
        overflow-wrap: break-word;
        /* Tự động ngắt từ dài */
        max-width: 300px;
        white-space: normal;
    }


    .pointer {
        cursor: pointer;
    }

    .box-custom {
        display: flex;
        /* Sử dụng flexbox để quản lý các phần tử con */
        flex-direction: column;
        /* Đặt các phần tử con (li) xuống dòng */
        /* gap: 8px; */
        /* Tạo khoảng cách giữa các nút */
    }

    .custom,
    .custom2,
    .custom3 {
        display: inline-flex;
        /* Fit với nội dung */
        align-items: center;
        /* Căn giữa icon và chữ theo chiều dọc */
        padding: 8px 12px;
        border-radius: 12px;
        white-space: nowrap;
        /* Đảm bảo nội dung không xuống dòng trong 1 nút */
        border: 1px solid !important;
    }

    .custom {
        border-color: #007bff;
        color: #007bff;
    }

    .custom2 {
        border-color: #ffc107;
        color: #ffc107;
    }

    .custom3 {
        border-color: #dc3545;
        color: #dc3545;
    }

    .custom span,
    .custom2 span,
    .custom3 span {
        margin-right: 8px;
        /* Khoảng cách giữa icon và chữ */
    }

    .status {
        border: 3px solid !important;
        padding: 8px 12px;
        border-radius: 12px;
        margin-bottom: 0 !important;
        border-color: #86857e;
        color: #86857e;
        font-weight: bold;
    }

    .status2 {
        border: 3px solid !important;
        padding: 8px 12px;
        border-radius: 12px;
        margin-bottom: 0 !important;
        border-color: #cd8c3a;
        color: #cd8c3a;
        font-weight: bold;

    }

    .status3 {
        border: 3px solid !important;
        padding: 8px 12px;
        border-radius: 12px;
        margin-bottom: 0 !important;
        border-color: #ffab40;
        color: #ffab40;
        font-weight: bold;

    }

    .status4 {
        border: 3px solid !important;
        padding: 8px 12px;
        border-radius: 12px;
        margin-bottom: 0 !important;
        border-color: #28a745;
        color: #28a745;
        font-weight: bold;
    }

    .status5 {
        border: 3px solid !important;
        padding: 8px 12px;
        border-radius: 12px;
        margin-bottom: 0 !important;
        border-color: #dc3545;
        color: #dc3545;
        font-weight: bold;

    }

    .form-select-lg {
        border-radius: 12px;
        /* Bo góc cho dropdown */
        border: 1px solid #287f71;
        /* Đổi màu viền thành xanh */
        color: #cca270;
        /* Màu chữ xanh */
        padding: 8px 12px;
        /* Khoảng cách bên trong */

        height: 55px;
        /* Tăng chiều cao */
        font-size: 1rem;
        /* Tăng kích thước chữ */
    }

    .form-select-lg:focus {
        border-color: #0056b3;
        /* Màu viền khi focus */
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        /* Đổ bóng nhẹ khi focus */
    }

    .no-dropdown-icon {
        appearance: none;
        /* Loại bỏ mũi tên dropdown mặc định */
        -moz-appearance: none;
        /* Firefox */
        -webkit-appearance: none;
        /* Safari, Chrome */
        background-image: none;
        /* Xóa icon nền mặc định */
        padding-right: 12px;
        /* Điều chỉnh padding bên phải nếu cần */
    }

    .icondetail {
        color: #007bff;
        font-size: 4rem;
    }

    .apexcharts-canvas {
        position: relative;
        user-select: none
    }

    .apexcharts-canvas ::-webkit-scrollbar {
        -webkit-appearance: none;
        width: 6px
    }

    .apexcharts-canvas ::-webkit-scrollbar-thumb {
        border-radius: 4px;
        background-color: rgba(0, 0, 0, .5);

        box-shadow: 0 0 1px rgba(255, 255, 255, .5);
        -webkit-box-shadow: 0 0 1px rgba(255, 255, 255, .5)
    }

    .apexcharts-inner {
        position: relative
    }

    .apexcharts-text tspan {
        font-family: inherit
    }

    .legend-mouseover-inactive {
        transition: .15s ease all;
        opacity: .2
    }

    .apexcharts-legend-text {
        padding-left: 15px;
        margin-left: -15px;
    }

    .apexcharts-series-collapsed {
        opacity: 0
    }

    .apexcharts-tooltip {
        border-radius: 5px;
        box-shadow: 2px 2px 6px -4px #999;
        cursor: default;
        font-size: 14px;
        left: 62px;
        opacity: 0;
        pointer-events: none;
        position: absolute;
        top: 20px;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        white-space: nowrap;
        z-index: 12;
        transition: .15s ease all
    }

    .apexcharts-tooltip.apexcharts-active {
        opacity: 1;
        transition: .15s ease all
    }

    .apexcharts-tooltip.apexcharts-theme-light {
        border: 1px solid #e3e3e3;
        background: rgba(255, 255, 255, .96)
    }

    .apexcharts-tooltip.apexcharts-theme-dark {
        color: #fff;
        background: rgba(30, 30, 30, .8)
    }

    .apexcharts-tooltip * {
        font-family: inherit
    }

    .apexcharts-tooltip-title {
        padding: 6px;
        font-size: 15px;
        margin-bottom: 4px
    }

    .apexcharts-tooltip.apexcharts-theme-light .apexcharts-tooltip-title {
        background: #eceff1;
        border-bottom: 1px solid #ddd
    }

    .apexcharts-tooltip.apexcharts-theme-dark .apexcharts-tooltip-title {
        background: rgba(0, 0, 0, .7);
        border-bottom: 1px solid #333
    }

    .apexcharts-tooltip-text-goals-value,
    .apexcharts-tooltip-text-y-value,
    .apexcharts-tooltip-text-z-value {
        display: inline-block;
        margin-left: 5px;
        font-weight: 600
    }

    .apexcharts-tooltip-text-goals-label:empty,
    .apexcharts-tooltip-text-goals-value:empty,
    .apexcharts-tooltip-text-y-label:empty,
    .apexcharts-tooltip-text-y-value:empty,
    .apexcharts-tooltip-text-z-value:empty,
    .apexcharts-tooltip-title:empty {
        display: none
    }

    .apexcharts-tooltip-text-goals-label,
    .apexcharts-tooltip-text-goals-value {
        padding: 6px 0 5px
    }

    .apexcharts-tooltip-goals-group,
    .apexcharts-tooltip-text-goals-label,
    .apexcharts-tooltip-text-goals-value {
        display: flex
    }

    .apexcharts-tooltip-text-goals-label:not(:empty),
    .apexcharts-tooltip-text-goals-value:not(:empty) {
        margin-top: -6px
    }

    .apexcharts-tooltip-marker {
        width: 12px;
        height: 12px;
        position: relative;
        top: 0;
        margin-right: 10px;
        border-radius: 50%
    }

    .apexcharts-tooltip-series-group {
        padding: 0 10px;
        display: none;
        text-align: left;
        justify-content: left;
        align-items: center
    }

    .apexcharts-tooltip-series-group.apexcharts-active .apexcharts-tooltip-marker {
        opacity: 1
    }

    .apexcharts-tooltip-series-group.apexcharts-active,
    .apexcharts-tooltip-series-group:last-child {
        padding-bottom: 4px
    }

    .apexcharts-tooltip-series-group-hidden {
        opacity: 0;
        height: 0;
        line-height: 0;
        padding: 0 !important
    }

    .apexcharts-tooltip-y-group {
        padding: 6px 0 5px
    }

    .apexcharts-custom-tooltip,
    .apexcharts-tooltip-box {
        padding: 4px 8px
    }

    .apexcharts-tooltip-boxPlot {
        display: flex;
        flex-direction: column-reverse
    }

    .apexcharts-tooltip-box>div {
        margin: 4px 0
    }

    .apexcharts-tooltip-box span.value {
        font-weight: 700
    }

    .apexcharts-tooltip-rangebar {
        padding: 5px 8px
    }

    .apexcharts-tooltip-rangebar .category {
        font-weight: 600;
        color: #777
    }

    .apexcharts-tooltip-rangebar .series-name {
        font-weight: 700;
        display: block;
        margin-bottom: 5px
    }

    .apexcharts-xaxistooltip,
    .apexcharts-yaxistooltip {
        opacity: 0;
        pointer-events: none;
        color: #373d3f;
        font-size: 13px;
        text-align: center;
        border-radius: 2px;
        position: absolute;
        z-index: 10;
        background: #eceff1;
        border: 1px solid #90a4ae
    }

    .apexcharts-xaxistooltip {
        padding: 9px 10px;
        transition: .15s ease all
    }

    .apexcharts-xaxistooltip.apexcharts-theme-dark {
        background: rgba(0, 0, 0, .7);
        border: 1px solid rgba(0, 0, 0, .5);
        color: #fff
    }

    .apexcharts-xaxistooltip:after,
    .apexcharts-xaxistooltip:before {
        left: 50%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none
    }

    .apexcharts-xaxistooltip:after {
        border-color: transparent;
        border-width: 6px;
        margin-left: -6px
    }

    .apexcharts-xaxistooltip:before {
        border-color: transparent;
        border-width: 7px;
        margin-left: -7px
    }

    .apexcharts-xaxistooltip-bottom:after,
    .apexcharts-xaxistooltip-bottom:before {
        bottom: 100%
    }

    .apexcharts-xaxistooltip-top:after,
    .apexcharts-xaxistooltip-top:before {
        top: 100%
    }

    .apexcharts-xaxistooltip-bottom:after {
        border-bottom-color: #eceff1
    }

    .apexcharts-xaxistooltip-bottom:before {
        border-bottom-color: #90a4ae
    }

    .apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:after,
    .apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:before {
        border-bottom-color: rgba(0, 0, 0, .5)
    }

    .apexcharts-xaxistooltip-top:after {
        border-top-color: #eceff1
    }

    .apexcharts-xaxistooltip-top:before {
        border-top-color: #90a4ae
    }

    .apexcharts-xaxistooltip-top.apexcharts-theme-dark:after,
    .apexcharts-xaxistooltip-top.apexcharts-theme-dark:before {
        border-top-color: rgba(0, 0, 0, .5)
    }

    .apexcharts-xaxistooltip.apexcharts-active {
        opacity: 1;
        transition: .15s ease all
    }

    .apexcharts-yaxistooltip {
        padding: 4px 10px
    }

    .apexcharts-yaxistooltip.apexcharts-theme-dark {
        background: rgba(0, 0, 0, .7);
        border: 1px solid rgba(0, 0, 0, .5);
        color: #fff
    }

    .apexcharts-yaxistooltip:after,
    .apexcharts-yaxistooltip:before {
        top: 50%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none
    }

    .apexcharts-yaxistooltip:after {
        border-color: transparent;
        border-width: 6px;
        margin-top: -6px
    }

    .apexcharts-yaxistooltip:before {
        border-color: transparent;
        border-width: 7px;
        margin-top: -7px
    }

    .apexcharts-yaxistooltip-left:after,
    .apexcharts-yaxistooltip-left:before {
        left: 100%
    }

    .apexcharts-yaxistooltip-right:after,
    .apexcharts-yaxistooltip-right:before {
        right: 100%
    }

    .apexcharts-yaxistooltip-left:after {
        border-left-color: #eceff1
    }

    .apexcharts-yaxistooltip-left:before {
        border-left-color: #90a4ae
    }

    .apexcharts-yaxistooltip-left.apexcharts-theme-dark:after,
    .apexcharts-yaxistooltip-left.apexcharts-theme-dark:before {
        border-left-color: rgba(0, 0, 0, .5)
    }

    .apexcharts-yaxistooltip-right:after {
        border-right-color: #eceff1
    }

    .apexcharts-yaxistooltip-right:before {
        border-right-color: #90a4ae
    }

    .apexcharts-yaxistooltip-right.apexcharts-theme-dark:after,
    .apexcharts-yaxistooltip-right.apexcharts-theme-dark:before {
        border-right-color: rgba(0, 0, 0, .5)
    }

    .apexcharts-yaxistooltip.apexcharts-active {
        opacity: 1
    }

    .apexcharts-yaxistooltip-hidden {
        display: none
    }

    .apexcharts-xcrosshairs,
    .apexcharts-ycrosshairs {
        pointer-events: none;
        opacity: 0;
        transition: .15s ease all
    }

    .apexcharts-xcrosshairs.apexcharts-active,
    .apexcharts-ycrosshairs.apexcharts-active {
        opacity: 1;
        transition: .15s ease all
    }

    .apexcharts-ycrosshairs-hidden {
        opacity: 0
    }

    .apexcharts-selection-rect {
        cursor: move
    }

    .svg_select_boundingRect,
    .svg_select_points_rot {
        pointer-events: none;
        opacity: 0;
        visibility: hidden
    }

    .apexcharts-selection-rect+g .svg_select_boundingRect,
    .apexcharts-selection-rect+g .svg_select_points_rot {
        opacity: 0;
        visibility: hidden
    }

    .apexcharts-selection-rect+g .svg_select_points_l,
    .apexcharts-selection-rect+g .svg_select_points_r {
        cursor: ew-resize;
        opacity: 1;
        visibility: visible
    }

    .svg_select_points {
        fill: #efefef;
        stroke: #333;
        rx: 2
    }

    .apexcharts-svg.apexcharts-zoomable.hovering-zoom {
        cursor: crosshair
    }

    .apexcharts-svg.apexcharts-zoomable.hovering-pan {
        cursor: move
    }

    .apexcharts-menu-icon,
    .apexcharts-pan-icon,
    .apexcharts-reset-icon,
    .apexcharts-selection-icon,
    .apexcharts-toolbar-custom-icon,
    .apexcharts-zoom-icon,
    .apexcharts-zoomin-icon,
    .apexcharts-zoomout-icon {
        cursor: pointer;
        width: 20px;
        height: 20px;
        line-height: 24px;
        color: #6e8192;
        text-align: center
    }

    .apexcharts-menu-icon svg,
    .apexcharts-reset-icon svg,
    .apexcharts-zoom-icon svg,
    .apexcharts-zoomin-icon svg,
    .apexcharts-zoomout-icon svg {
        fill: #6e8192
    }

    .apexcharts-selection-icon svg {
        fill: #444;
        transform: scale(.76)
    }

    .apexcharts-theme-dark .apexcharts-menu-icon svg,
    .apexcharts-theme-dark .apexcharts-pan-icon svg,
    .apexcharts-theme-dark .apexcharts-reset-icon svg,
    .apexcharts-theme-dark .apexcharts-selection-icon svg,
    .apexcharts-theme-dark .apexcharts-toolbar-custom-icon svg,
    .apexcharts-theme-dark .apexcharts-zoom-icon svg,
    .apexcharts-theme-dark .apexcharts-zoomin-icon svg,
    .apexcharts-theme-dark .apexcharts-zoomout-icon svg {
        fill: #f3f4f5
    }

    .apexcharts-canvas .apexcharts-reset-zoom-icon.apexcharts-selected svg,
    .apexcharts-canvas .apexcharts-selection-icon.apexcharts-selected svg,
    .apexcharts-canvas .apexcharts-zoom-icon.apexcharts-selected svg {
        fill: #008ffb
    }

    .apexcharts-theme-light .apexcharts-menu-icon:hover svg,
    .apexcharts-theme-light .apexcharts-reset-icon:hover svg,
    .apexcharts-theme-light .apexcharts-selection-icon:not(.apexcharts-selected):hover svg,
    .apexcharts-theme-light .apexcharts-zoom-icon:not(.apexcharts-selected):hover svg,
    .apexcharts-theme-light .apexcharts-zoomin-icon:hover svg,
    .apexcharts-theme-light .apexcharts-zoomout-icon:hover svg {
        fill: #333
    }

    .apexcharts-menu-icon,
    .apexcharts-selection-icon {
        position: relative
    }

    .apexcharts-reset-icon {
        margin-left: 5px
    }

    .apexcharts-menu-icon,
    .apexcharts-reset-icon,
    .apexcharts-zoom-icon {
        transform: scale(.85)
    }

    .apexcharts-zoomin-icon,
    .apexcharts-zoomout-icon {
        transform: scale(.7)
    }

    .apexcharts-zoomout-icon {
        margin-right: 3px
    }

    .apexcharts-pan-icon {
        transform: scale(.62);
        position: relative;
        left: 1px;
        top: 0
    }

    .apexcharts-pan-icon svg {
        fill: #fff;
        stroke: #6e8192;
        stroke-width: 2
    }

    .apexcharts-pan-icon.apexcharts-selected svg {
        stroke: #008ffb
    }

    .apexcharts-pan-icon:not(.apexcharts-selected):hover svg {
        stroke: #333
    }

    .apexcharts-toolbar {
        position: absolute;
        z-index: 11;
        max-width: 176px;
        text-align: right;
        border-radius: 3px;
        padding: 0 6px 2px;
        display: flex;
        justify-content: space-between;
        align-items: center
    }

    .apexcharts-menu {
        background: #fff;
        position: absolute;
        top: 100%;
        border: 1px solid #ddd;
        border-radius: 3px;
        padding: 3px;
        right: 10px;
        opacity: 0;
        min-width: 110px;
        transition: .15s ease all;
        pointer-events: none
    }

    .apexcharts-menu.apexcharts-menu-open {
        opacity: 1;
        pointer-events: all;
        transition: .15s ease all
    }

    .apexcharts-menu-item {
        padding: 6px 7px;
        font-size: 12px;
        cursor: pointer
    }

    .apexcharts-theme-light .apexcharts-menu-item:hover {
        background: #eee
    }

    .apexcharts-theme-dark .apexcharts-menu {
        background: rgba(0, 0, 0, .7);
        color: #fff
    }

    @media screen and (min-width:768px) {
        .apexcharts-canvas:hover .apexcharts-toolbar {
            opacity: 1
        }
    }

    .apexcharts-canvas .apexcharts-element-hidden,
    .apexcharts-datalabel.apexcharts-element-hidden,
    .apexcharts-hide .apexcharts-series-points {
        opacity: 0
    }

    .apexcharts-hidden-element-shown {
        opacity: 1;
        transition: 0.25s ease all;
    }

    .apexcharts-datalabel,
    .apexcharts-datalabel-label,
    .apexcharts-datalabel-value,
    .apexcharts-datalabels,
    .apexcharts-pie-label {
        cursor: default;
        pointer-events: none
    }

    .apexcharts-pie-label-delay {
        opacity: 0;
        animation-name: opaque;
        animation-duration: .3s;
        animation-fill-mode: forwards;
        animation-timing-function: ease
    }

    .apexcharts-radialbar-label {
        cursor: pointer;
    }

    .apexcharts-annotation-rect,
    .apexcharts-area-series .apexcharts-area,
    .apexcharts-area-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
    .apexcharts-gridline,
    .apexcharts-line,
    .apexcharts-line-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
    .apexcharts-point-annotation-label,
    .apexcharts-radar-series path,
    .apexcharts-radar-series polygon,
    .apexcharts-toolbar svg,
    .apexcharts-tooltip .apexcharts-marker,
    .apexcharts-xaxis-annotation-label,
    .apexcharts-yaxis-annotation-label,
    .apexcharts-zoom-rect {
        pointer-events: none
    }

    .apexcharts-marker {
        transition: .15s ease all
    }

    .resize-triggers {
        animation: 1ms resizeanim;
        visibility: hidden;
        opacity: 0;
        height: 100%;
        width: 100%;
        overflow: hidden
    }

    .contract-trigger:before,
    .resize-triggers,
    .resize-triggers>div {
        content: " ";
        display: block;
        position: absolute;
        top: 0;
        left: 0
    }

    .resize-triggers>div {
        height: 100%;
        width: 100%;
        background: #eee;
        overflow: auto
    }

    .contract-trigger:before {
        overflow: hidden;
        width: 200%;
        height: 200%
    }

    .apexcharts-bar-goals-markers {
        pointer-events: none
    }

    .apexcharts-bar-shadows {
        pointer-events: none
    }

    .apexcharts-rangebar-goals-markers {
        pointer-events: none
    }
    </style>
</head>

<!-- Vendor -->
<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>

<!-- Apexcharts JS -->
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- for basic area chart -->
<script src="{{ asset('apexcharts.com/samples/assets/stock-prices.js') }}"></script>

<!-- Widgets Init Js -->
<script src="{{ asset('assets/js/pages/analytics-dashboard.init.js') }}"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"
    integrity="sha384-FPeSrlLZ8JovkJlY1eoF8vD3vBuiWoflqKa4+rFbEzpB93hkoXgm/c8KFwaM4z3x" crossorigin="anonymous">
</script>

<!-- Hidden SVG (optional, used for custom functionality) -->
<svg id="SvgjsSvg1763" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
    style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
    <defs id="SvgjsDefs1764"></defs>
    <polyline id="SvgjsPolyline1765" points="0,0"></polyline>
    <path id="SvgjsPath1766"
        d="M-1 192.99519938278198L-1 192.99519938278198L84.29558110237122 192.99519938278198L140.49263517061868 192.99519938278198L196.68968923886615 192.99519938278198L252.88674330711362 192.99519938278198L309.0837973753611 192.99519938278198L365.2808514436086 192.99519938278198L421.4779055118561 192.99519938278198L477.6749595801036 192.99519938278198L533.8720136483511 192.99519938278198L590.0690677165985 192.99519938278198C590.0690677165985 192.99519938278198 646.266121784846 192.99519938278198 646.266121784846 192.99519938278198">
    </path>
</svg>

<!-- App js-->
<script src="{{ asset('assets/js/app.js') }}"></script>