<!DOCTYPE html>
<html lang="en">

<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
   
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Otika - Admin Dashboard Template</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('/Admin/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('/Admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/Admin/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('/Admin/css/components.css') }}">

    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('/Admin/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('/Admin/img/favicon.ico') }}' />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    {{-- Extra Files --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    {{-- Permission Table Library --}}
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
{{-- Roles Form Css --}}
<style>
    :root {
    --blue: #5e72e4;
    --indigo: #5603ad;
    --purple: #8965e0;
    --pink: #f3a4b5;
    --red: #f5365c;
    --orange: #fb6340;
    --yellow: #ffd600;
    --green: #2dce89;
    --teal: #11cdef;
    --cyan: #2bffc6;
    --white: #fff;
    --gray: #8898aa;
    --gray-dark: #32325d;
    --light: #ced4da;
    --lighter: #e9ecef;
    --primary: #5e72e4;
    --secondary: #f7fafc;
    --success: #2dce89;
    --info: #11cdef;
    --warning: #fb6340;
    --danger: #f5365c;
    --light: #adb5bd;
    --dark: #212529;
    --default: #172b4d;
    --white: #fff;
    --neutral: #fff;
    --darker: black;
    --breakpoint-xs: 0;
    --breakpoint-sm: 576px;
    --breakpoint-md: 768px;
    --breakpoint-lg: 992px;
    --breakpoint-xl: 1200px;
    --font-family-sans-serif: Open Sans, sans-serif;
    --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace;
}

*,
*::before,
*::after {
    box-sizing: border-box;
}

@-ms-viewport {
    width: device-width;
}

figcaption,
footer,
main,
nav,
section {
    display: block;
}

body {
    font-family: Open Sans, sans-serif;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    margin: 0;
    text-align: left;
    color: #525f7f;
    background-color: #f8f9fe;
}

[tabindex='-1']:focus {
    outline: 0 !important;
}

h2,
h3 {
    margin-top: 0;
    margin-bottom: .5rem;
}

p {
    margin-top: 0;
    margin-bottom: 1rem;
}

ul {
    margin-top: 0;
    margin-bottom: 1rem;
}

ul ul {
    margin-bottom: 0;
}

dfn {
    font-style: italic;
}

strong {
    font-weight: bolder;
}

a {
    text-decoration: none;
    color: #5e72e4;
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
}

a:hover {
    text-decoration: none;
    color: #233dd2;
}

a:not([href]):not([tabindex]) {
    text-decoration: none;
    color: inherit;
}

a:not([href]):not([tabindex]):hover,
a:not([href]):not([tabindex]):focus {
    text-decoration: none;
    color: inherit;
}

a:not([href]):not([tabindex]):focus {
    outline: 0;
}

img {
    vertical-align: middle;
    border-style: none;
}

table {
    border-collapse: collapse;
}

caption {
    padding-top: 1rem;
    padding-bottom: 1rem;
    caption-side: bottom;
    text-align: left;
    color: #8898aa;
}

th {
    text-align: inherit;
}

button {
    border-radius: 0;
}

button:focus {
    outline: 1px dotted;
    outline: 5px auto -webkit-focus-ring-color;
}

input,
button {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
    margin: 0;
}

button,
input {
    overflow: visible;
}

button {
    text-transform: none;
}

button,
[type='reset'],
[type='submit'] {
    -webkit-appearance: button;
}

button::-moz-focus-inner,
[type='button']::-moz-focus-inner,
[type='reset']::-moz-focus-inner,
[type='submit']::-moz-focus-inner {
    padding: 0;
    border-style: none;
}

input[type='radio'],
input[type='checkbox'] {
    box-sizing: border-box;
    padding: 0;
}

input[type='date'],
input[type='time'],
input[type='datetime-local'],
input[type='month'] {
    -webkit-appearance: listbox;
}

legend {
    font-size: 1.5rem;
    line-height: inherit;
    display: block;
    width: 100%;
    max-width: 100%;
    margin-bottom: .5rem;
    padding: 0;
    white-space: normal;
    color: inherit;
}

progress {
    vertical-align: baseline;
}

[type='number']::-webkit-inner-spin-button,
[type='number']::-webkit-outer-spin-button {
    height: auto;
}

[type='search'] {
    outline-offset: -2px;
    -webkit-appearance: none;
}

[type='search']::-webkit-search-cancel-button,
[type='search']::-webkit-search-decoration {
    -webkit-appearance: none;
}

::-webkit-file-upload-button {
    font: inherit;
    -webkit-appearance: button;
}

[hidden] {
    display: none !important;
}

h2,
h3,
.h2,
.h3 {
    font-family: inherit;
    font-weight: 600;
    line-height: 1.5;
    margin-bottom: .5rem;
    color: #32325d;
}

h2,
.h2 {
    font-size: 1.25rem;
}

h3,
.h3 {
    font-size: 1.0625rem;
}

.container {
    width: 100%;
    margin-right: auto;
    margin-left: auto;
    padding-right: 15px;
    padding-left: 15px;
}

@media (min-width: 576px) {
    .container {
        max-width: 540px;
    }
}

@media (min-width: 768px) {
    .container {
        max-width: 720px;
    }
}

@media (min-width: 992px) {
    .container {
        max-width: 960px;
    }
}

@media (min-width: 1200px) {
    .container {
        max-width: 1140px;
    }
}

.row {
    display: flex;
    margin-right: -15px;
    margin-left: -15px;
    flex-wrap: wrap;
}

.col,
.col-xl-6 {
    position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}

.col {
    max-width: 100%;
    flex-basis: 0;
    flex-grow: 1;
}

@media (min-width: 1200px) {

    .col-xl-6 {
        max-width: 50%;
        flex: 0 0 50%;
    }
}

.table {
    width: 100%;
    margin-bottom: 1rem;
    background-color: transparent;
}

.table th,
.table td {
    padding: 1rem;
    vertical-align: top;
    border-top: 1px solid #e9ecef;
}

.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #e9ecef;
}

.table tbody + tbody {
    border-top: 2px solid #e9ecef;
}

.table .table {
    background-color: #f8f9fe;
}

.table-dark,
.table-dark > th,
.table-dark > td {
    background-color: #c1c2c3;
}

.table .thead-dark th {
    color: #f8f9fe;
    border-color: #1f3a68;
    background-color: #172b4d;
}

.table .thead-light th {
    color: #8898aa;
    border-color: #e9ecef;
    background-color: #f6f9fc;
}

.table-dark {
    color: #f8f9fe;
    background-color: #172b4d;
}

.table-dark th,
.table-dark td,
.table-dark thead th {
    border-color: #1f3a68;
}

.table-responsive {
    display: block;
    overflow-x: auto;
    width: 100%;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar;
}

.btn {
    font-size: 1rem;
    font-weight: 600;
    line-height: 1.5;
    display: inline-block;
    padding: .625rem 1.25rem;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    text-align: center;
    vertical-align: middle;
    white-space: nowrap;
    border: 1px solid transparent;
    border-radius: .375rem;
}

@media screen and (prefers-reduced-motion: reduce) {
    .btn {
        transition: none;
    }
}

.btn:hover,
.btn:focus {
    text-decoration: none;
}

.btn:focus {
    outline: 0;
    box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
}

.btn.disabled,
.btn:disabled {
    opacity: .65;
    box-shadow: none;
}

.btn:not(:disabled):not(.disabled) {
    cursor: pointer;
}

.btn:not(:disabled):not(.disabled):active,
.btn:not(:disabled):not(.disabled).active {
    box-shadow: none;
}

.btn:not(:disabled):not(.disabled):active:focus,
.btn:not(:disabled):not(.disabled).active:focus {
    box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08), none;
}

a.btn.disabled {
    pointer-events: none;
}

.btn-sm {
    font-size: .875rem;
    line-height: 1.5;
    padding: .25rem .5rem;
    border-radius: .375rem;
}

.dropdown {
    position: relative;
}

.dropdown-menu {
    font-size: 1rem;
    position: absolute;
    z-index: 1000;
    top: 100%;
    left: 0;
    display: none;
    float: left;
    min-width: 10rem;
    margin: .125rem 0 0;
    padding: .5rem 0;
    list-style: none;
    text-align: left;
    color: #525f7f;
    border: 0 solid rgba(0, 0, 0, .15);
    border-radius: .4375rem;
    background-color: #fff;
    background-clip: padding-box;
    box-shadow: 0 50px 100px rgba(50, 50, 93, .1), 0 15px 35px rgba(50, 50, 93, .15), 0 5px 15px rgba(0, 0, 0, .1);
}

.dropdown-menu-right {
    right: 0;
    left: auto;
}

.dropdown-menu[x-placement^='top'],
.dropdown-menu[x-placement^='right'],
.dropdown-menu[x-placement^='bottom'],
.dropdown-menu[x-placement^='left'] {
    right: auto;
    bottom: auto;
}

.dropdown-item {
    font-weight: 400;
    display: block;
    clear: both;
    width: 100%;
    padding: .25rem 1.5rem;
    text-align: inherit;
    white-space: nowrap;
    color: #212529;
    border: 0;
    background-color: transparent;
}

.dropdown-item:hover,
.dropdown-item:focus {
    text-decoration: none;
    color: #16181b;
    background-color: #f6f9fc;
}

.dropdown-item.active,
.dropdown-item:active {
    text-decoration: none;
    color: #fff;
    background-color: #5e72e4;
}

.dropdown-item.disabled,
.dropdown-item:disabled {
    color: #8898aa;
    background-color: transparent;
}

.nav {
    display: flex;
    margin-bottom: 0;
    padding-left: 0;
    list-style: none;
    flex-wrap: wrap;
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    border: 1px solid rgba(0, 0, 0, .05);
    border-radius: .375rem;
    background-color: #fff;
    background-clip: border-box;
}

.card-header {
    margin-bottom: 0;
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid rgba(0, 0, 0, .05);
    background-color: #fff;
}

.card-header:first-child {
    border-radius: calc(.375rem - 1px) calc(.375rem - 1px) 0 0;
}

.card-footer {
    padding: 1.25rem 1.5rem;
    border-top: 1px solid rgba(0, 0, 0, .05);
    background-color: #fff;
}

.card-footer:last-child {
    border-radius: 0 0 calc(.375rem - 1px) calc(.375rem - 1px);
}

.pagination {
    display: flex;
    padding-left: 0;
    list-style: none;
    border-radius: .375rem;
}

.page-link {
    line-height: 1.25;
    position: relative;
    display: block;
    margin-left: -1px;
    padding: .5rem .75rem;
    color: #8898aa;
    border: 1px solid #dee2e6;
    background-color: #fff;
}

.page-link:hover {
    z-index: 2;
    text-decoration: none;
    color: #8898aa;
    border-color: #dee2e6;
    background-color: #dee2e6;
}

.page-link:focus {
    z-index: 2;
    outline: 0;
    box-shadow: none;
}

.page-link:not(:disabled):not(.disabled) {
    cursor: pointer;
}

.page-item:first-child .page-link {
    margin-left: 0;
    border-top-left-radius: .375rem;
    border-bottom-left-radius: .375rem;
}

.page-item:last-child .page-link {
    border-top-right-radius: .375rem;
    border-bottom-right-radius: .375rem;
}

.page-item.active .page-link {
    z-index: 1;
    color: #fff;
    border-color: #5e72e4;
    background-color: #5e72e4;
}

.page-item.disabled .page-link {
    cursor: auto;
    pointer-events: none;
    color: #8898aa;
    border-color: #dee2e6;
    background-color: #fff;
}

.badge {
    font-size: 66%;
    font-weight: 600;
    line-height: 1;
    display: inline-block;
    padding: .35rem .375rem;
    text-align: center;
    vertical-align: baseline;
    white-space: nowrap;
    border-radius: .375rem;
}

.badge:empty {
    display: none;
}

.btn .badge {
    position: relative;
    top: -1px;
}

@keyframes progress-bar-stripes {
    from {
        background-position: 1rem 0;
    }

    to {
        background-position: 0 0;
    }
}

.progress {
    font-size: .75rem;
    display: flex;
    overflow: hidden;
    height: 1rem;
    border-radius: .375rem;
    background-color: #e9ecef;
    box-shadow: inset 0 .1rem .1rem rgba(0, 0, 0, .1);
}

.progress-bar {
    display: flex;
    flex-direction: column;
    transition: width .6s ease;
    text-align: center;
    white-space: nowrap;
    color: #fff;
    background-color: #5e72e4;
    justify-content: center;
}

@media screen and (prefers-reduced-motion: reduce) {
    .progress-bar {
        transition: none;
    }
}

.media {
    display: flex;
    align-items: flex-start;
}

.media-body {
    flex: 1 1;
}

.tooltip {
    font-family: Open Sans, sans-serif;
    font-size: .875rem;
    font-weight: 400;
    font-style: normal;
    line-height: 1.5;
    position: absolute;
    z-index: 1070;
    display: block;
    margin: 0;
    text-align: left;
    text-align: start;
    white-space: normal;
    text-decoration: none;
    letter-spacing: normal;
    word-spacing: normal;
    text-transform: none;
    word-wrap: break-word;
    word-break: normal;
    opacity: 0;
    text-shadow: none;
    line-break: auto;
}

.tooltip.show
{
    opacity: .9;
}
.tooltip .arrow
{
    position: absolute;

    display: block;

    width: .8rem;
    height: .4rem;
}
.tooltip .arrow::before
{
    position: absolute;

    content: '';

    border-style: solid;
    border-color: transparent;
}

.bs-tooltip-top,
.bs-tooltip-auto[x-placement^='top']
{
    padding: .4rem 0;
}
.bs-tooltip-top .arrow,
.bs-tooltip-auto[x-placement^='top'] .arrow
{
    bottom: 0;
}
.bs-tooltip-top .arrow::before,
.bs-tooltip-auto[x-placement^='top'] .arrow::before
{
    top: 0;

    border-width: .4rem .4rem 0;
    border-top-color: #000;
}

.bs-tooltip-right,
.bs-tooltip-auto[x-placement^='right']
{
    padding: 0 .4rem;
}
.bs-tooltip-right .arrow,
.bs-tooltip-auto[x-placement^='right'] .arrow
{
    left: 0;

    width: .4rem;
    height: .8rem;
}
.bs-tooltip-right .arrow::before,
.bs-tooltip-auto[x-placement^='right'] .arrow::before
{
    right: 0;

    border-width: .4rem .4rem .4rem 0;
    border-right-color: #000;
}

.bs-tooltip-bottom,
.bs-tooltip-auto[x-placement^='bottom']
{
    padding: .4rem 0;
}
.bs-tooltip-bottom .arrow,
.bs-tooltip-auto[x-placement^='bottom'] .arrow
{
    top: 0;
}
.bs-tooltip-bottom .arrow::before,
.bs-tooltip-auto[x-placement^='bottom'] .arrow::before
{
    bottom: 0;

    border-width: 0 .4rem .4rem;
    border-bottom-color: #000;
}

.bs-tooltip-left,
.bs-tooltip-auto[x-placement^='left']
{
    padding: 0 .4rem;
}
.bs-tooltip-left .arrow,
.bs-tooltip-auto[x-placement^='left'] .arrow
{
    right: 0;

    width: .4rem;
    height: .8rem;
}
.bs-tooltip-left .arrow::before,
.bs-tooltip-auto[x-placement^='left'] .arrow::before
{
    left: 0;

    border-width: .4rem 0 .4rem .4rem;
    border-left-color: #000;
}

.tooltip-inner
{
    max-width: 200px;
    padding: .25rem .5rem;

    text-align: center;

    color: #fff;
    border-radius: .375rem;
    background-color: #000;
}

.bg-success {
    background-color: #2dce89 !important;
}

a.bg-success:hover,
a.bg-success:focus,
button.bg-success:hover,
button.bg-success:focus {
    background-color: #24a46d !important;
}

.bg-info {
    background-color: #11cdef !important;
}

a.bg-info:hover,
a.bg-info:focus,
button.bg-info:hover,
button.bg-info:focus {
    background-color: #0da5c0 !important;
}

.bg-warning {
    background-color: #fb6340 !important;
}

a.bg-warning:hover,
a.bg-warning:focus,
button.bg-warning:hover,
button.bg-warning:focus {
    background-color: #fa3a0e !important;
}

.bg-danger {
    background-color: #f5365c !important;
}

a.bg-danger:hover,
a.bg-danger:focus,
button.bg-danger:hover,
button.bg-danger:focus {
    background-color: #ec0c38 !important;
}

.bg-default {
    background-color: #172b4d !important;
}

a.bg-default:hover,
a.bg-default:focus,
button.bg-default:hover,
button.bg-default:focus {
    background-color: #0b1526 !important;
}

.bg-transparent {
    background-color: transparent !important;
}

.border-0 {
    border: 0 !important;
}

.rounded-circle {
    border-radius: 50% !important;
}

.d-flex {
    display: flex !important;
}

.justify-content-end {
    justify-content: flex-end !important;
}

.align-items-center {
    align-items: center !important;
}

@media (min-width: 1200px) {

    .justify-content-xl-between {
        justify-content: space-between !important;
    }
}

.sr-only {
    position: absolute;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    width: 1px;
    height: 1px;
    padding: 0;
    white-space: nowrap;
    border: 0;
}

.shadow {
    box-shadow: 0 0 2rem 0 rgba(136, 152, 170, .15) !important;
}

.mb-0 {
    margin-bottom: 0 !important;
}

.mr-2 {
    margin-right: .5rem !important;
}

.mr-3 {
    margin-right: 1rem !important;
}

.mr-4 {
    margin-right: 1.5rem !important;
}

.mt-5 {
    margin-top: 3rem !important;
}

.mb-5 {
    margin-bottom: 3rem !important;
}

.mt-7 {
    margin-top: 6rem !important;
}

.py-4 {
    padding-top: 1.5rem !important;
}

.py-4 {
    padding-bottom: 1.5rem !important;
}

.m-auto {
    margin: auto !important;
}

.text-right {
    text-align: right !important;
}

.text-center {
    text-align: center !important;
}

.text-white {
    color: #fff !important;
}

.text-light {
    color: #adb5bd !important;
}

a.text-light:hover,
a.text-light:focus {
    color: #919ca6 !important;
}

.text-white {
    color: #fff !important;
}

a.text-white:hover,
a.text-white:focus {
    color: #e6e6e6 !important;
}

@media print {
    *,
  *::before,
  *::after {
        box-shadow: none !important;
        text-shadow: none !important;
    }

    a:not(.btn) {
        text-decoration: underline;
    }

    thead {
        display: table-header-group;
    }

    tr,
  img {
        page-break-inside: avoid;
    }

    p,
  h2,
  h3 {
        orphans: 3;
        widows: 3;
    }

    h2,
  h3 {
        page-break-after: avoid;
    }

@    page {
        size: a3;
    }

    body {
        min-width: 992px !important;
    }

    .container {
        min-width: 992px !important;
    }

    .badge {
        border: 1px solid #000;
    }

    .table {
        border-collapse: collapse !important;
    }

    .table td,
  .table th {
        background-color: #fff !important;
    }

    .table-dark {
        color: inherit;
    }

    .table-dark th,
  .table-dark td,
  .table-dark thead th,
  .table-dark tbody + tbody {
        border-color: #e9ecef;
    }

    .table .thead-dark th {
        color: inherit;
        border-color: #e9ecef;
    }
}

figcaption,
main {
    display: block;
}

main {
    overflow: hidden;
}

@keyframes floating-lg {
    0% {
        transform: translateY(0px);
    }

    50% {
        transform: translateY(15px);
    }

    100% {
        transform: translateY(0px);
    }
}

@keyframes floating {
    0% {
        transform: translateY(0px);
    }

    50% {
        transform: translateY(10px);
    }

    100% {
        transform: translateY(0px);
    }
}

@keyframes floating-sm {
    0% {
        transform: translateY(0px);
    }

    50% {
        transform: translateY(5px);
    }

    100% {
        transform: translateY(0px);
    }
}

[class*='shadow'] {
    transition: all .15s ease;
}

.text-sm {
    font-size: .875rem !important;
}

.text-white {
    color: #fff !important;
}

a.text-white:hover,
a.text-white:focus {
    color: #e6e6e6 !important;
}

.text-light {
    color: #ced4da !important;
}

a.text-light:hover,
a.text-light:focus {
    color: #b1bbc4 !important;
}

.avatar {
    font-size: 1rem;
    display: inline-flex;
    width: 48px;
    height: 48px;
    color: #fff;
    border-radius: 50%;
    background-color: #adb5bd;
    align-items: center;
    justify-content: center;
}

.avatar img {
    width: 100%;
    border-radius: 50%;
}

.avatar-sm {
    font-size: .875rem;
    width: 36px;
    height: 36px;
}

.avatar-group .avatar {
    position: relative;
    z-index: 2;
    border: 2px solid #fff;
}

.avatar-group .avatar:hover {
    z-index: 3;
}

.avatar-group .avatar + .avatar {
    margin-left: -1rem;
}

.badge {
    text-transform: uppercase;
}

.badge a {
    color: #fff;
}

.btn .badge:not(:first-child) {
    margin-left: .5rem;
}

.btn .badge:not(:last-child) {
    margin-right: .5rem;
}

.badge-dot {
    font-size: .875rem;
    font-weight: 400;
    padding-right: 0;
    padding-left: 0;
    text-transform: none;
    background: transparent;
}

.badge-dot strong {
    color: #32325d;
}

.badge-dot i {
    display: inline-block;
    width: .375rem;
    height: .375rem;
    margin-right: .375rem;
    vertical-align: middle;
    border-radius: 50%;
}

.btn {
    font-size: .875rem;
    position: relative;
    transition: all .15s ease;
    letter-spacing: .025em;
    text-transform: none;
    will-change: transform;
}

.btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
}

.btn:not(:last-child) {
    margin-right: .5rem;
}

.btn i:not(:first-child) {
    margin-left: .5rem;
}

.btn i:not(:last-child) {
    margin-right: .5rem;
}

.btn-sm {
    font-size: .75rem;
}

[class*='btn-outline-'] {
    border-width: 1px;
}

.btn-icon-only {
    width: 2.375rem;
    height: 2.375rem;
    padding: 0;
}

a.btn-icon-only {
    line-height: 2.5;
}

.btn-icon-only.btn-sm {
    width: 2rem;
    height: 2rem;
}

.main-content {
    position: relative;
}

.dropdown {
    display: inline-block;
}

.dropdown-menu {
    min-width: 12rem;
}
.dropdown-menu.show
{
    display: block;
}


.dropdown-menu .dropdown-item {
    font-size: .875rem;
    padding: .5rem 1rem;
}

.dropdown-menu .dropdown-item > i {
    font-size: 1rem;
    margin-right: 1rem;
    vertical-align: -17%;
}

.dropdown-menu a.media > div:first-child {
    line-height: 1;
}

.dropdown-menu a.media p {
    color: #8898aa;
}

.dropdown-menu a.media:hover p {
    color: #172b4d !important;
}

.footer {
    padding: 2.5rem 0;
    background: #f7fafc;
}

.footer .copyright {
    font-size: .875rem;
}

@media (min-width: 768px) {

@    keyframes show-navbar-dropdown {
        0% {
      transition: visibility .25s, opacity .25s, transform .25s;
        transform: translate(0, 10px) perspective(200px) rotateX(-2deg);
        opacity: 0;
    }

    100% {
        transform: translate(0, 0);
        opacity: 1;
    }
}

@keyframes hide-navbar-dropdown {
    from {
        opacity: 1;
    }

    to {
        transform: translate(0, 10px);
        opacity: 0;
    }
}
}

@keyframes show-navbar-collapse {
    0% {
        transform: scale(.95);
        transform-origin: 100% 0;
        opacity: 0;
    }

    100% {
        transform: scale(1);
        opacity: 1;
    }
}

@keyframes hide-navbar-collapse {
    from {
        transform: scale(1);
        transform-origin: 100% 0;
        opacity: 1;
    }

    to {
        transform: scale(.95);
        opacity: 0;
    }
}

.page-item.active .page-link {
    box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
}

.page-item .page-link,
.page-item span {
    font-size: .875rem;
    display: flex;
    width: 36px;
    height: 36px;
    margin: 0 3px;
    padding: 0;
    border-radius: 50% !important;
    align-items: center;
    justify-content: center;
}

.progress {
    overflow: hidden;
    height: 8px;
    margin-bottom: 1rem;
    border-radius: .25rem;
    background-color: #e9ecef;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
}

.progress .sr-only {
    font-size: 13px;
    line-height: 20px;
    left: 0;
    clip: auto;
    width: auto;
    height: 20px;
    margin: 0 0 0 30px;
}

.progress-bar {
    height: auto;
    border-radius: 0;
    box-shadow: none;
}

.table thead th {
    font-size: .65rem;
    padding-top: .75rem;
    padding-bottom: .75rem;
    letter-spacing: 1px;
    text-transform: uppercase;
    border-bottom: 1px solid #e9ecef;
}

.table th {
    font-weight: 600;
}

.table td .progress {
    width: 120px;
    height: 3px;
    margin: 0;
}

.table td,
.table th {
    font-size: .8125rem;
    white-space: nowrap;
}

.table.align-items-center td,
.table.align-items-center th {
    vertical-align: middle;
}

.table .thead-dark th {
    color: #4d7bca;
    background-color: #1c345d;
}

.table .thead-light th {
    color: #8898aa;
    background-color: #f6f9fc;
}

.table-flush td,
.table-flush th {
    border-right: 0;
    border-left: 0;
}

.table-flush tbody tr:first-child td,
.table-flush tbody tr:first-child th {
    border-top: 0;
}

.table-flush tbody tr:last-child td,
.table-flush tbody tr:last-child th {
    border-bottom: 0;
}

.card .table {
    margin-bottom: 0;
}

.card .table td,
.card .table th {
    padding-right: 1.5rem;
    padding-left: 1.5rem;
}

p {
    font-size: 1rem;
    font-weight: 300;
    line-height: 1.7;
}

@media (max-width: 768px) {
    .btn {
        margin-bottom: 10px;
    }
}
</style>
{{-- Roles Form Css --}}
<style>
.wrapper  {
  background-color: #fff;
  border-radius: 5px;
  width: 360px;
  max-width: 100%;
  box-sizing: border-box;
}
.images {
  display: flex;
  flex-wrap:  wrap;
  margin-top: 20px;
}
.images .img,
.images .pic {
  flex-basis: 31%;
  margin-bottom: 10px;
  border-radius: 4px;
}
.images .img {
  width: 112px;
  height: 93px;
  background-size: cover;
  margin-right: 10px;
  background-position: center;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  position: relative;
  overflow: hidden;
}
.images .img:nth-child(3n) {
  margin-right: 0;
}
.images .img span {
  display: none;
  text-transform: capitalize;
  z-index: 2;
}
.images .img::after {
  content: '';
  width: 100%;
  height: 100%;
  transition: opacity .1s ease-in;
  border-radius: 4px;
  opacity: 0;
  position: absolute;
}
.images .img:hover::after {
  display: block;
  background-color: #000;
  opacity: .5;
}
.images .img:hover span {
  display: block;
  color: #fff;
}
.images .pic {
  background-color: #F5F7FA;
  align-self: center;
  text-align: center;
  padding: 40px 0;
  text-transform: uppercase;
  color: #848EA1;
  font-size: 12px;
  cursor: pointer;
}

@media screen and (max-width: 400px) {
  .wrapper {
    margin-top: 0;  
  }
  header {
    flex-direction: column;
  }
  header span {
    text-align: left;
    margin-top: 10px;
  }
  .ways li,
  section input, 
  section textarea,
  .select-option .head, 
  .select-option .option div {
   font-size: 8px;
  }
  .images .img,
  .images .pic {
    flex-basis: 100%;
    margin-right: 0;
  }
}
@keyframes fadeIn {
  0% { opacity: 0; }
  100% { opacity: 1; }
}


</style>
<body>
    {{-- <div class="loader"></div> --}}
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn">
                                <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                        <li>
                            <form class="form-inline mr-auto">
                                <div class="search-element">
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                                        data-width="200">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
                            <span class="badge headerBadge1">
                                6 </span> </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                            <div class="dropdown-header">
                                Messages
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-message">
                                <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-avatar
											text-white"> <img alt="image"
                                            src="{{ asset('/Admin/img/users/user-1.png') }}" class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">John
                                            Deo</span>
                                        <span class="time messege-text">Please check your mail !!</span>
                                        <span class="time">2 Min Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-avatar text-white">
                                        <img alt="image" src="{{ asset('/Admin/img/users/user-2.png') }}"
                                            class="rounded-circle')}}">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                                            Smith</span> <span class="time messege-text">Request for leave
                                            application</span>
                                        <span class="time">5 Min Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-avatar text-white">
                                        <img alt="image" src="{{ asset('/Admin/img/users/user-5.png') }}"
                                            class="rounded-circle')}}">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Jacob
                                            Ryan</span> <span class="time messege-text">Your payment invoice is
                                            generated.</span> <span class="time">12 Min Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-avatar text-white">
                                        <img alt="image" src="{{ asset('/Admin/img/users/user-4.png') }}"
                                            class="rounded-circle')}}">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Lina
                                            Smith</span> <span class="time messege-text">hii John, I have upload
                                            doc
                                            related to task.</span> <span class="time">30
                                            Min Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-avatar text-white">
                                        <img alt="image" src="{{ asset('/Admin/img/users/user-3.png') }}"
                                            class="rounded-circle')}}">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Jalpa
                                            Joshi</span> <span class="time messege-text">Please do as specify.
                                            Let me
                                            know if you have any query.</span> <span class="time">1
                                            Days Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-avatar text-white">
                                        <img alt="image" src="{{ asset('/Admin/img/users/user-2.png') }}  "
                                            class="rounded-circle')}}s">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                                            Smith</span> <span class="time messege-text">Client Requirements</span>
                                        <span class="time">2 Days Ago</span>
                                    </span>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link notification-toggle nav-link-lg"><i data-feather="bell"
                                class="bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                            <div class="dropdown-header">
                                Notifications
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                <a href="#" class="dropdown-item dropdown-item-unread"> <span
                                        class="dropdown-item-icon bg-primary text-white"> <i
                                            class="fas
												fa-code"></i>
                                    </span> <span class="dropdown-item-desc"> Template update is
                                        available now! <span class="time">2 Min
                                            Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-icon bg-info text-white"> <i
                                            class="far
												fa-user"></i>
                                    </span> <span class="dropdown-item-desc"> <b>You</b> and <b>Dedik
                                            Sugiharto</b> are now friends <span class="time">10 Hours
                                            Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-icon bg-success text-white"> <i
                                            class="fas
												fa-check"></i>
                                    </span> <span class="dropdown-item-desc"> <b>Kusnaedi</b> has
                                        moved task <b>Fix bug header</b> to <b>Done</b> <span class="time">12
                                            Hours
                                            Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-icon bg-danger text-white"> <i
                                            class="fas fa-exclamation-triangle"></i>
                                    </span> <span class="dropdown-item-desc"> Low disk space. Let's
                                        clean it! <span class="time">17 Hours Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-icon bg-info text-white"> <i
                                            class="fas
												fa-bell"></i>
                                    </span> <span class="dropdown-item-desc"> Welcome to Otika
                                        template! <span class="time">Yesterday</span>
                                    </span>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image"
                                src="{{ asset('/Admin/img/user.png ') }}" class="user-img-radious-style"> <span
                                class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Hello Sarah Smith</div>
                            <a href="{{url('user_profile')}}" class="dropdown-item has-icon"> <i
                                    class="far
										fa-user"></i> Profile
                            </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                                Activities
                            </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                                Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            {{-- <a href="auth-login.html" class="dropdown-item has-icon text-danger"> <i
                                    class="fas fa-sign-out-alt"></i>
                                Logout
                            </a> --}}
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                        </div>
                        
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html"> <img alt="image"
                                src="{{ asset('Admin/img/logo.png" class="header-logo') }}" /> <span
                                class="logo-name">Otika</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Main</li>
                        <li class="dropdown active">
                            <a href="{{url('admin_index_')}}" class="nav-link"><i
                                    data-feather="monitor"></i><span>Dashboard</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="briefcase"></i><span>Products</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ url('addproduct') }}">Add Products</a></li>
                                <li><a class="nav-link" href="{{ url('showproduct') }}">Show Products</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="https://www.google.com/" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="command"></i><span>Category</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ url('maincategory') }}">Main Category</a></li>
                                <li><a class="nav-link" href="{{ url('subCategory') }}">Sub Category</a></li>
                                {{-- <li><a class="nav-link" href="{{ url('subCategory1') }}">Sub Category 1</a></li> --}}
                            </ul>
                        </li>

                        <li >
                            <a href="{{url("brands")}}" class=" nav-link "><i
                                    data-feather="command"></i><span>Brands</span></a>

                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="mail"></i><span>Email</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="email-inbox.html">Inbox</a></li>
                                <li><a class="nav-link" href="email-compose.html">Compose</a></li>
                                <li><a class="nav-link" href="email-read.html">read</a></li>
                            </ul>
                        </li>
                        {{-- <li class="menu-header">S</li> --}}
                        <li><a class="nav-link" href="blank.html"><i data-feather="file"></i><span>Uer Management
                            Page</span></a></li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="copy"></i><span>Basic
                                    Components</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="alert.html">Alert</a></li>
                                <li><a class="nav-link" href="badge.html">Badge</a></li>
                                <li><a class="nav-link" href="breadcrumb.html">Breadcrumb</a></li>
                                <li><a class="nav-link" href="buttons.html">Buttons</a></li>
                                <li><a class="nav-link" href="collapse.html">Collapse</a></li>
                                <li><a class="nav-link" href="dropdown.html">Dropdown</a></li>
                                <li><a class="nav-link" href="checkbox-and-radio.html">Checkbox &amp; Radios</a></li>
                                <li><a class="nav-link" href="list-group.html">List Group</a></li>
                                <li><a class="nav-link" href="media-object.html">Media Object</a></li>
                                <li><a class="nav-link" href="navbar.html">Navbar</a></li>
                                <li><a class="nav-link" href="pagination.html">Pagination</a></li>
                                <li><a class="nav-link" href="popover.html">Popover</a></li>
                                <li><a class="nav-link" href="progress.html">Progress</a></li>
                                <li><a class="nav-link" href="tooltip.html">Tooltip</a></li>
                                <li><a class="nav-link" href="flags.html">Flag</a></li>
                                <li><a class="nav-link" href="typography.html">Typography</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="shopping-bag"></i><span>Advanced</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="avatar.html">Avatar</a></li>
                                <li><a class="nav-link" href="card.html">Card</a></li>
                                <li><a class="nav-link" href="modal.html">Modal</a></li>
                                <li><a class="nav-link" href="sweet-alert.html">Sweet Alert</a></li>
                                <li><a class="nav-link" href="toastr.html">Toastr</a></li>
                                <li><a class="nav-link" href="empty-state.html">Empty State</a></li>
                                <li><a class="nav-link" href="multiple-upload.html">Multiple Upload</a></li>
                                <li><a class="nav-link" href="pricing.html">Pricing</a></li>
                                <li><a class="nav-link" href="tabs.html">Tab</a></li>
                            </ul>
                        </li>
                        {{-- @role('Admin') --}}
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="file"></i><span>User Management</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{url('Roles')}}">Roles</a></li>
                                <li><a class="nav-link" href="{{url('Permission')}}">Permission</a></li>
                                {{-- <li><a class="nav-link" href="email-read.html">read</a></li> --}}
                            </ul>
                        </li>
                            {{-- @endrole --}}
                        <li class="menu-header">Otika</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="layout"></i><span>Forms</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="basic-form.html">Basic Form</a></li>
                                <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                                <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                                <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                                <li><a class="nav-link" href="form-wizard.html">Form Wizard</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="grid"></i><span>Tables</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="basic-table.html">Basic Tables</a></li>
                                <li><a class="nav-link" href="advance-table.html">Advanced Table</a></li>
                                <li><a class="nav-link" href="datatables.html">Datatable</a></li>
                                <li><a class="nav-link" href="export-table.html">Export Table</a></li>
                                <li><a class="nav-link" href="editable-table.html">Editable Table</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="pie-chart"></i><span>Charts</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="chart-amchart.html">amChart</a></li>
                                <li><a class="nav-link" href="chart-apexchart.html">apexchart</a></li>
                                <li><a class="nav-link" href="chart-echart.html">eChart</a></li>
                                <li><a class="nav-link" href="chart-chartjs.html">Chartjs</a></li>
                                <li><a class="nav-link" href="chart-sparkline.html">Sparkline</a></li>
                                <li><a class="nav-link" href="chart-morris.html">Morris</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="feather"></i><span>Icons</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="icon-font-awesome.html">Font Awesome</a></li>
                                <li><a class="nav-link" href="icon-material.html">Material Design</a></li>
                                <li><a class="nav-link" href="icon-ionicons.html">Ion Icons</a></li>
                                <li><a class="nav-link" href="icon-feather.html">Feather Icons</a></li>
                                <li><a class="nav-link" href="icon-weather-icon.html">Weather Icon</a></li>
                            </ul>
                        </li>
                        <li class="menu-header">Media</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="image"></i><span>Gallery</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="light-gallery.html">Light Gallery</a></li>
                                <li><a href="gallery1.html">Gallery 2</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="flag"></i><span>Sliders</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="carousel.html">Bootstrap Carousel.html</a></li>
                                <li><a class="nav-link" href="owl-carousel.html">Owl Carousel</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link" href="timeline.html"><i
                                    data-feather="sliders"></i><span>Timeline</span></a></li>
                        <li class="menu-header">Maps</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="map"></i><span>Google
                                    Maps</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
                                <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
                                <li><a href="gmaps-geocoding.html">Geocoding</a></li>
                                <li><a href="gmaps-geolocation.html">Geolocation</a></li>
                                <li><a href="gmaps-marker.html">Marker</a></li>
                                <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
                                <li><a href="gmaps-route.html">Route</a></li>
                                <li><a href="gmaps-simple.html">Simple</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link" href="vector-map.html"><i data-feather="map-pin"></i><span>Vector
                                    Map</span></a></li>
                        <li class="menu-header">Pages</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="user-check"></i><span>Auth</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('login_') }}">Login</a></li>
                                <li><a href="{{ url('register_') }}">Register</a></li>
                                <li><a href="auth-forgot-password.html">Forgot Password</a></li>
                                <li><a href="auth-reset-password.html">Reset Password</a></li>
                                <li><a href="subscribe.html">Subscribe</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="alert-triangle"></i><span>Errors</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="errors-503.html">503</a></li>
                                <li><a class="nav-link" href="errors-403.html">403</a></li>
                                <li><a class="nav-link" href="errors-404.html">404</a></li>
                                <li><a class="nav-link" href="errors-500.html">500</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="anchor"></i><span>Other
                                    Pages</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="create-post.html">Create Post</a></li>
                                <li><a class="nav-link" href="posts.html">Posts</a></li>
                                <li><a class="nav-link" href="profile.html">Profile</a></li>
                                <li><a class="nav-link" href="contact.html">Contact</a></li>
                                <li><a class="nav-link" href="invoice.html">Invoice</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="chevrons-down"></i><span>Multilevel</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Menu 1</a></li>
                                <li class="dropdown">
                                    <a href="#" class="has-dropdown">Menu 2</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Child Menu 1</a></li>
                                        <li class="dropdown">
                                            <a href="#" class="has-dropdown">Child Menu 2</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Child Menu 1</a></li>
                                                <li><a href="#">Child Menu 2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"> Child Menu 3</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </aside>
            </div>
            <!-- Main Content -->
            <div class="main-content">

                @section('content')
                @show
                
                <div class="settingSidebar">
                    <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
                    </a>
                    <div class="settingSidebar-body ps-container ps-theme-default">
                        <div class=" fade show active">
                            <div class="setting-panel-header">Setting Panel
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Select Layout</h6>
                                <div class="selectgroup layout-color w-50">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="1"
                                            class="selectgroup-input-radio select-layout" checked>
                                        <span class="selectgroup-button">Light</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="2"
                                            class="selectgroup-input-radio select-layout">
                                        <span class="selectgroup-button">Dark</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                                <div class="selectgroup selectgroup-pills sidebar-color">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="1"
                                            class="selectgroup-input select-sidebar">
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="2"
                                            class="selectgroup-input select-sidebar" checked>
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Color Theme</h6>
                                <div class="theme-setting-options">
                                    <ul class="choose-theme list-unstyled mb-0">
                                        <li title="white" class="active">
                                            <div class="white"></div>
                                        </li>
                                        <li title="cyan">
                                            <div class="cyan"></div>
                                        </li>
                                        <li title="black">
                                            <div class="black"></div>
                                        </li>
                                        <li title="purple">
                                            <div class="purple"></div>
                                        </li>
                                        <li title="orange">
                                            <div class="orange"></div>
                                        </li>
                                        <li title="green">
                                            <div class="green"></div>
                                        </li>
                                        <li title="red">
                                            <div class="red"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox"
                                            class="custom-switch-input" id="mini_sidebar_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Mini Sidebar</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox"
                                            class="custom-switch-input" id="sticky_header_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Sticky Header</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                                    <i class="fas fa-undo"></i> Restore Default
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    <a href="templateshub.net">Templateshub</a></a>
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('/Admin/js/app.min.js') }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('/Admin/bundles/apexcharts/apexcharts.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('/Admin/js/page/index.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('/Admin/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('/Admin/js/custom.js') }}"></script>
    @include('sweetalert::alert')
    {{-- Multi select Dropdown --}}

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('Admin/js/multiselect-dropdown.js')}}"></script>
<script>
    (function ($) {
  $(document).ready(function () {
    
    generateID()
    choose()
    generateOption()
    selectionOption()
    removeClass()
    uploadImage()
    submit()
    resetButton()
    removeNotification()
    autoRemoveNotification()
    autoDequeue()
    
    var ID
    var way = 0
    var queue = []
    var fullStock = 10
    var speedCloseNoti = 1000
    
    function generateID() {
      var text = $('header span')
      var newID = ''
    
      for(var i = 0; i < 3; i++) {
        newID += Math.floor(Math.random() * 3)
      }
      
      ID = 'ID: 5988' + newID
      text.html(ID)
    }
    
    function choose() {
      var li = $('.ways li')
      var section = $('.sections section')
      var index = 0
      li.on('click', function () {
        index = $(this).index()
        $(this).addClass('active')
        $(this).siblings().removeClass('active')
        
        section.siblings().removeClass('active')
        section.eq(index).addClass('active')
        if(!way) {
          way = 1
        }  else {
          way = 0
        }
      })
    }
    
    function generateOption() {
      var select = $('select option')
      var selectAdd = $('.select-option .option')
      $.each(select, function (i, val) {
          $('.select-option .option').append('<div rel="'+ $(val).val() +'">'+ $(val).html() +'</div>')
      })
    }
    
    function selectionOption() {
      var select = $('.select-option .head')
      var option = $('.select-option .option div')
    
      select.on('click', function (event) {
        event.stopPropagation()
        $('.select-option').addClass('active')
      })
      
      option.on('click', function () {
        var value = $(this).attr('rel')
        $('.select-option').removeClass('active')  
        select.html(value)
    
        $('select#category').val(value)
      })
    }
    
    function removeClass() {
      $('body').on('click', function () { 
        $('.select-option').removeClass('active')   
      })                  
    }
    
    function uploadImage() {
      var button = $('.images .pic')
      var uploader = $('<input type="file" accept="image/*" name="images" />')
      var images = $('.images')
      
      button.on('click', function () {
        uploader.click()
      })
      
      uploader.on('change', function () {
          var reader = new FileReader()
          reader.onload = function(event) {
            images.prepend('<div class="img" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"><span>remove</span></div>')
          }
          reader.readAsDataURL(uploader[0].files[0])
  
       })
      
      images.on('click', '.img', function () {
        $(this).remove()
      })
    
    }
    
    function submit() {  
      var button = $('#send')
      
      button.on('click', function () {
        if(!way) {
          var title = $('#title')
          var cate  = $('#category')
          var images = $('.images .img')
          var imageArr = []

          
          for(var i = 0; i < images.length; i++) {
            imageArr.push({url: $(images[i]).attr('rel')})
          }
          
          var newStock = {
            title: title.val(),
            category: cate.val(),
            images: imageArr,
            type: 1
          }
          
          saveToQueue(newStock)
        } else {
          // discussion
          var topic = $('#topic')
          var message = $('#msg')
          
          var newStock = {
            title: topic.val(),
            message: message.val(),
            type: 2
          }
          
          saveToQueue(newStock)
        }
      })
    }
    
    function removeNotification() {
      var close = $('.notification')
      close.on('click', 'span', function () {
        var parent = $(this).parent()
        parent.fadeOut(300)
        setTimeout(function() {
          parent.remove()
        }, 300)
      })
    }
    
    function autoRemoveNotification() {
      setInterval(function() {
        var notification = $('.notification')
        var notiPage = $(notification).children('.btn')
        var noti = $(notiPage[0])
        
        setTimeout(function () {
          setTimeout(function () {
           noti.remove()
          }, speedCloseNoti)
          noti.fadeOut(speedCloseNoti)
        }, speedCloseNoti)
      }, speedCloseNoti)
    }
    
    function autoDequeue() {
      var notification = $('.notification')
      var text
      
      setInterval(function () {

          if(queue.length > 0) {
            if(queue[0].type == 2) {
              text = ' Your discusstion is sent'
            } else {
              text = ' Your order is allowed.'
            }
            
            notification.append('<div class="success btn"><p><strong>Success:</strong>'+ text +'</p><span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></div>')
            queue.splice(0, 1)
            
          }  
      }, 10000)
    }
    
    function resetButton() {
      var resetbtn = $('#reset')
      resetbtn.on('click', function () {
        reset()
      })
    }
    
    // helpers
    function saveToQueue(stock) {
      var notification = $('.notification')
      var check = 0
      
      if(queue.length <= fullStock) {
        if(stock.type == 2) {
            if(!stock.title || !stock.message) {
              check = 1
            }
        } else {
          if(!stock.title || !stock.category || stock.images == 0) {
            check = 1
          }
        }
        
        if(check) {
          notification.append('<div class="error btn"><p><strong>Error:</strong> Please fill in the form.</p><span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></div>')
        } else {
          notification.append('<div class="success btn"><p><strong>Success:</strong> '+ ID +' is submitted.</p><span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></div>')
          queue.push(stock)
          reset()
        }
      } else {
        notification.append('<div class="error btn"><p><strong>Error:</strong> Please waiting a queue.</p><span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></div>')
      } 
    }
    function reset() {
      
      $('#title').val('')
      $('.select-option .head').html('Category')
      $('select#category').val('')
      
      var images = $('.images .img')
      for(var i = 0; i < images.length; i++) {
        $(images)[i].remove()
      }
      
      var topic = $('#topic').val('')
      var message = $('#msg').val('')
    }
  })
})(jQuery)
</script>
</body>
<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
