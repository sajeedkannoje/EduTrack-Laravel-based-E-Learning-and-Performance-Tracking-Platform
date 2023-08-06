<?php
$configData = Helper::applClasses();
?>
<style>
.site-prefer-black,
.navigation .nav-item a {
    background: #111111 !important;
}

.main-menu.menu-dark .navigation li a > * {
  text-transform: capitalize;
}

.main-menu {
    width: 330px !important;
}

.main-menu .navbar-header {
    width: 330px !important;
    padding-top: 30px;
    height: max-content;
    padding-left: 35px;
    padding-bottom: 10px;
}

.main-menu ul {
    margin-bottom:125px;
}

.brand-logo {
    font-size: 0.5208333333333334vw;
}

.brand-logo .logo-icon img {
    width: 6.5em;
    height: 6.5em;
}

.brand-logo .logo-txt img {
    width: 9.7em;
    height: 2.4em;
}

.logo-txt {
    align-self: center;
}

.menu-content li {
    padding-left: 20px;
}

.main-menu-content .main-menu-navigation .nav-item>a {
    margin-top: 10px !important;
    height: max-content;
    padding-left: 40px !important;
}

.nav-item svg {
    margin-right: 10px !important;
}

.divider {
    height: 1px;
    margin-top: 20px;
    margin-bottom: 15px;
}

.main-menu .navbar-header .brand-logo .navbar-brand {
    margin: 0;
}

.navigation .nav-item a {
    box-shadow: none !important;
    padding-left: 0px !important;
}

.active {
    box-shadow: none !important;
    background: none !important;
}

.navigation .nav-item .menu-title {
    text-decoration: none;
    height: max-content;
}

.navigation .nav-item a::after {
    margin-left: 5px;
}

.main-menu .navigation .nav-item a::after {
    display: none !important;
}

.module-section svg,
.section-quiz svg {
    padding-top: 4px;
    align-self: baseline;
}

.main-menu.menu-dark .navigation>li>ul li:first-of-type {
    margin-top: 0 !important;
}

.text-muted {
    color: #4c4c4c !important;
}

.menu-content .active a span {
    text-decoration: underline !important;
    text-decoration-color: currentcolor !important;
    text-decoration-color: yellow !important;
    text-underline-offset: 1px;
}
.sidebar-group-active > a span{
    color:yellow;
}

.active-url>a span,
.nav-item.active> a span,
.active > .sub-menu-url span{
    color: white;
}

.main-menu-content {
    font-size: 0.5208333333333334vw;
    margin-bottom: 125px;
}

.navigation {
    font-size: max(13px,1.6em);
}

.menu-content svg,
.nav-item svg {
    font-size: 0.5208333333333334vw !important;
    height: 2em !important;
    width: 2em !important;
}
.main-menu span{
    color: rgb(255,255,255, 0.7) !important;
}

.nav-item.active a .menu-title, .menu-content .active a .menu-item {
  color: white !important;
}

.plus-icon, .minus-icon {
    position: absolute;
    top: 15px;
    right: 0px;
    font-size: 20px !important;
    transition: 0.2s ease-in-out;
    cursor: pointer;
}

.minus-icon {
    display:none;
}

.nav-item.module-ele a {
  align-items: baseline !important;
}

.nav-item.module-ele.has-sub.open .plus-icon {
    display: none;
    transition: 0.2s ease-in-out;
}

.nav-item.module-ele.has-sub.open .minus-icon {
    display: block;
    transition: 0.2s ease-in-out;
}

span.text-wrap.text-white.fw-bolder {
    margin-right: 10px;
    font-size: 16px;
}

ul#main-menu-navigation .nav-item:nth-child(1) .plus-icon {
    display:none;
}

ul#main-menu-navigation .nav-item:nth-child(1) .minus-icon {
    display:none;
}

i.fw-bolder.text-yellow.fi-br-arrow-left {
    margin-top: -6px;
}

.content-body .alert.alert-danger {
    width:101%;
    margin-left: 30px;
    padding-bottom: 5px;
}

ul#main-menu-navigation .nav-item i::before {
    font-size: 14px;
    padding:25px 0px;
}

.dashboard-card-cointainer {
    display:flex;
    flex-wrap:wrap;
    justify-content:space-between;
}

.justify-content-start #section-controls button {
  padding: 14px 45px;
}
.single-section-content ul.link-list li p {
  font-size: 20px;
  line-height:26px;
}
.quiz-question-list-container {
  align-items: flex-start !important;
}
.quiz-question-list-style {
  margin-top:2px;
}
.quiz-question-list-input {
  position: relative;
}
.quiz-question-list-input input {
  position: absolute;
  top: 8px;
  left: 0px;
}
.quiz-question-list-input label {
  padding-left: 15px;
}
.progress {
  margin-bottom:10px;
}
.quote-author {
  font-size: 14px;
}
.module-section a, .section-quiz a {
  align-items: flex-start !important;
}
.module-section a i, .section-quiz a i {
  margin-top: 0px !important;
}
.link-list-item a.g-text {
    font-size: 20px;
}
.ffn-box-btn {
    border: 1px solid black;
    padding: 10px;
    transition: 0.3s ease-in-out;
    color: black;
}
.ffn-box-btn:hover {
  color: forestgreen;
  border: 1px solid forestgreen;
}
.brand-logo .logo-icon img {
    width: 9.5em;
    height: 9.5em;
}
.brand-logo .logo-txt img {
    width: 11.7em;
    height: 3.4em;
}
.link-list-item, .book {
  align-items: baseline;
}
.single-section-content .g-text {
  line-height: 1.4;
}
.link-list-item a.g-text, .single-section-content a.g-text {
  transition: 0.3s ease-in-out;
}
.link-list-item a.g-text:hover, .single-section-content a.g-text:hover{
  color: #1d1b1e;
}
.d-font-change {
  font-size: 20px !important;
}
.link-list-item.link-list-para-change {
  font-size: max(2em, 13px);
  line-height: 1.3;
}
#dashboard-footer-green-text {
  font-size: initial !important;
}
.footer-br-display {
  display: none;
}
.content-txt .content-pts svg {
  margin-top:4px;
}
.description-container p {
  line-height:24px;
}
.nav-item.active-1 {
  color:white;
}
.main-menu span.module-completed {
  color:yellow !important;
  opacity: 0.5;
}
.quiz-attempt-show {
  margin-top: 0px;
}
.new-green-text {
  color:forestgreen !important;
  font-weight: bold;
}
.ffn-inline{
  display: inline-flex !important;
}
.ffn-container {
  display:flex;
  align-items: center;
  margin-top:-4px;
}
.link-list-item .ffn-fav {
  top: -2px;
}
.ffn-margin {
  margin-right:30px;
}
.ffn-fav {
  width: 90px;
  height: 40px;
  padding: 10px;
  margin-left: 10px;
  background-color: forestgreen;
  color: white;
  font-size: 16px;
  position: relative;
  display: inline-flex;
  align-items: center;
  cursor: default;
}
.ffn-fav::after {
  content: "";
position: absolute;
width: 0px;
height: 0px;
border-top: 20px solid transparent;
border-bottom: 20px solid transparent;
border-left: 20px solid forestgreen;
top: 0px;
right: -20px;
}
.ffn-fav::before {
  content: "";
width: 10px;
height: 10px;
background-color: white;
border-radius: 100%;
position: absolute;
right: 0px;
}
.find-more-text {
  font-weight: bold;
  font-size: max(2.4em, 18px) !important;
}
#section-controls a .btn-txt, .section-controls a .btn-text {
  font-size:20px;
}
.quiz-attempt-show .font-m {
  height: 10%;
}
.quiz-attempt-show .value-of-score {
  height: 90%;
}
.btn-bitbucket {
    display: inline-block !important;
}
.quiz-questions .card-footer {
  display: flex;
}
.card-image img {
  max-height: 40em;
}
.value-of-score .attempt:last-of-type {
  padding-bottom: 30px;
}
.change-text-spacing-para{
  margin-bottom: 10px;
}
.single-section-content h4 {
  margin-bottom:10px;
}
.tr-green td, .g-bg {
  background-color: forestgreen;
  color: white !important;
}
.y-bg {
  background-color: #feef00;
  color: black;
}
.r-bg {
  background-color: red;
  color: white;
}
.quiz-after-attempt-left-container {
  display: flex;
flex-direction: row-reverse;
justify-content: space-between;
align-items: center;
}
.quiz-after-attempt-left-container .image {
  width:48%;
}
.quiz-after-attempt-left-container .image img {
  width: 100%;
}
.grey-bg {
  background-color:#D1D1D1;
  color: black !important;
}
.start-quiz-1 {
  padding: 1.6em 6.7em;
}
.page-head .text-black.float-left.font-l, .heading.row .col-md-6.text-black.float-left.font-l {
  line-height: initial;
}
.ffn-fave-margin {
  margin-top: 30px;
  margin-bottom:20px;
  margin-left:0px;
}
.card-margin-bottom{
  margin-bottom: 20px;
}
.link-list li:last-of-type a {
  display: block;
}
.table-overflow {
  overflow: auto;
}
#copyMaker.hiddenput {
  font-family:'serif';
}



@media (min-width:2000px){
  .font-s {
    font-size: 1.4em !important;
}
.font-l {
  font-size: 28px !important;
}
.font-m {
  font-size: 20px !important;
}
video {
  width: 100%;
  height:auto;
}
}

@media  only screen and (max-width:1880px){
    .right-content-card-section-container {
        width:95%;
        margin:0 auto;
    }
}

@media  only screen and (max-width:1680px){
  .ffn-fav {
    font-size:14px;
    height: 30px;
    width:85px;
  }
  .ffn-fav::before {
    content: "";
    width: 8px;
    height: 8px;
    background-color: white;
    border-radius: 100%;
    position: absolute;
    right: 1px;
}
.ffn-fav::after {
  border-top: 15px solid transparent;
    border-bottom: 15px solid transparent;
    border-left: 15px solid forestgreen;
    right: -15px;
}
#section-controls a .btn-txt, .start-quiz .btn-txt, .submit-quiz, .reset-quiz, .btn-bitbucket {
  font-size:16px;
}
.attemp-last-para {
  font-size: 20px !important;
}
}

@media  only screen and (max-width:1780px){
  .single-section-content ul.link-list li p {
    font-size:18px;
  }
  .d-font-change {
    font-size: 18px !important;
}
}

@media  only screen and (max-width:1680px){
  .link-list-item a.g-text {
    font-size: 16px;
  }
  .link-list-item {
    align-items: baseline;
  }
  .single-section-content .g-text {
    line-height:26px;
  }
  .single-section-content ul.link-list li p {
    font-size: 16px;
}
.link-list-item i, .book i {
    font-size: max(0.6em,13px);
}
#section-controls a,.section-controls .start-quiz {
  padding:0px !important;
}
#section-controls a .btn-txt, .section-controls .start-quiz .btn-txt, .btn-bitbucket, .start-quiz-1 .btn-txt{
  padding: 16px 45px;
  display: block;
  line-height: 24px;
}
.btn-bitbucket {
  display: inline;
}
.start-quiz-1 {
  padding: 0px !important;
}
}

@media  only screen and (max-width:1580px){
  .d-font-change {
    font-size: 16px !important;
}
}

@media  only screen and (max-width:1500px){
  .link-list-item a.g-text {
    font-size: max(0.8em,13px);
}
.single-section-content .g-text {
    line-height: 1.4;
}
.single-section-content ul.link-list li p {
    font-size: 14px;
}
.content-txt .content-pts svg {
    margin-top: 2px!important;
}
#section-controls a .btn-txt, .section-controls .start-quiz .btn-txt, .btn-bitbucket, .start-quiz-1 .btn-txt {
    padding: 10px 30px;
    display: block;
    line-height: 24px;
}
#section-controls a .btn-txt, .start-quiz .btn-txt, .submit-quiz, .reset-quiz, .btn-bitbucket {
    font-size: 14px !important;
}
}

@media  only screen and (max-width:1440px){
  .quiz-score-after-result .attemp-last-para {
    font-size:16px !important; 
  }
}

@media  only screen and (max-width:1400px){
    .nav-pills .nav-link {
        padding: 10px;
        max-width:170px;
        width:100%;
    }

    ul.nav.nav-pills.flex-column.nav-left.pass-page {
        width: 30%;
        margin-right: 100px;
    }
}

@media  only screen and (max-width:1280px){
  .quiz-after-attempt-left-container {
    padding:30px;
  }
}

@media(max-width:1200px) {
  .attempt-container.quiz-attempt-show .font-m {
        height:auto !important;
        font-size:18px;
    }

    .menu-content svg,
    .nav-item svg,
    .brand-logo{
        font-size: 7px !important;
    }

    .main-menu {
        width: 260px !important;
    }

    ul.nav.navbar-nav.align-items-center.ms-auto li.nav-item.dropdown.dropdown-user {
        display: none;
    }

    li.nav-item.d-xl-none #dropdown-user {
        height: 90px;
        align-items: flex-start !important;
    }

    li.nav-item.d-xl-none #dropdown-user span {
        margin-top:5px;
        margin-left:6px;
        font-size: 16px;
    }

    li.nav-item.d-xl-none .dropdown-menu.dropdown-menu-end {
        inset: auto auto -5px -55px !important;
    }

    li.nav-item.d-xl-none .dropdown-menu.dropdown-menu-end a.dropdown-item.fw-bolder.text-black {
        background-color: #111111 !important;
        color: white !important;
        border: 1px solid;
        display:flex;
        align-items:center;
    }

    li.nav-item.d-xl-none .dropdown-menu.dropdown-menu-end a.dropdown-item.fw-bolder.text-black svg {
        margin-left:10px;
        color:forestgreen;
    }

    .plus-icon, .minus-icon {
        top: 6px;
    }

    li.nav-item.module-ele a i {
        margin-top: -12px;
    }

    li.nav-item.module-ele a .fi-br-chart-set-theory {
        margin-top:0px !important;
    }

    .student-module-head-name, .student-module-head-title, .card-body p, .quiz-based-card > div {
        font-size: 16px;
    }

    .head-module-content, .head {
        margin-bottom: 10px;
    }

    .head-section-content {
        margin-bottom:20px;
    }

    .title {
        font-size:22px;
        margin-bottom:0px;
    }

    .footer .clearfix {
        font-size:14px;
    }

    .footer span i {
        font-size:16px !important;
    }

    .final-exams-content {
        margin-bottom:0px !important;
    }

    .description-container .d-title {
        font-size:20px !important;
    }

    .description-container .font-medium-2, .link-list-item i, .link-list-item a.g-text, .single-section-content .d-text  {
        font-size:16px !important;
    }

    #section-controls a {
        font-size:8px;
        padding: 14px 40px;
    }

    .start-quiz {
        font-size:8px;
        padding:6px 23px;
    }

    #section-controls {
        margin-top: 30px !important;
    }

    .content-txt.mx-auto .title {
        margin-bottom:12px;
    }

    .card-header h3.font-ml {
        font-size: 20px !important;
        margin-top:10px;
    }

    .single-section-content h3, .card.text-left .card-header, .card-body.single-quiz-content h3, .row.attempt-container .font-m  {
        font-size:20px;
    }

    .single-section-content p, .single-section-content .g-text {
        font-size:16px;
        line-height: 24px;
    }

    .card {
        margin-left:20px;
        margin-right:20px;
    }

    .page-head {
        margin-left:20px;
    }

    .content-body {
        width: 100%;
        margin-right: 0px !important;
        margin-left: 0px !important;
    }
    .dashboard-row {
      width: 100%;
      padding-left:40px;
      padding-right:10px;
    }
    .dashboard-row div.card {
      margin-left:0px !important;
      margin-right:0px !important;
    }
    .final-exams-content .title{
      margin-left: 0px;
    }
    .dashboard-card-container {
      margin-left: 0px !important;
    }
    .justify-content-start #section-controls button {
      font-size:14px;
      padding: 14px 40px;
    }
    .single-section-content ul.link-list li p {
      font-size: 16px;
      line-height:20px;
    }
    .simple-interest-table-container {
      overflow-x: auto;
    }
    .compound.table-container {
      table-layout:initial;
      width:100%;
      margin: 20px 0px;
    }
    .quiz-question-list-style {
    margin-top: 2px !important;
}
.module-section a, .section-quiz a {
  align-items: flex-start !important;
}
.module-section a i, .section-quiz a i {
  margin-top: 0px !important;
}
ul#main-menu-navigation .nav-item i::before {
    font-size: 15px;
}
.content-txt .content-pts svg {
    margin-top: 0px!important;
}
.quiz-question-list-container {
  margin: 3px !important;
}
.quiz-question-list-input label {
    padding-left: 15px !important;
}
.table-container {
  width:100%;
  table-layout: initial;
}
.dashboard-final-result {
  font-size:28px;
}
}

@media  only screen and (max-width:980px){

    ul.nav.nav-pills.flex-column.nav-left.pass-page {
        width: 50%;
        margin-right: 30px;
    }
}

@media  only screen and (max-width:940px){
  .quiz-attempt-show .font-m {
    height: 16%;
}
}

@media  only screen and (max-width:900px){
    #quiz-layout {
        width:95%;
    }
}

@media  only screen and (max-width:880px){
  .ffn-fav {
    margin-left:0px;
    margin-right:20px;
  }
  .dashboard-card-container {
    margin-top:0px; 
  }
  .dashboard-percentage-text-container {
    margin-bottom:30px;
  }
  .quiz-container-div, .image {
    width: 60%;
  }
}

@media(max-width:767.98px) {

    .menu-content svg,
    .nav-item svg,
    .brand-logo,
    .main-menu-content {
        font-size: 6.5px !important;
    }

    .content-body {
        margin-right: 0px;
        margin-left: 0px;
    }

    .content-body .alert.alert-danger {
        width:100%;
        margin-left:0px;
    }

    .card {
        margin: 40px 0px 0px 0px;
    }

    span.text-wrap.text-white.fw-bolder {
        font-size:14px;
    }

    li.nav-item.d-xl-none #dropdown-user span {
        font-size:14px;
    }

    .content-body .row {
    --bs-gutter-x: 0px;
    }

    .title{
        margin-left:5px;
    }

    .nav-pills .nav-link {
        max-width:none;
    }

    ul.nav.nav-pills.flex-column.nav-left.pass-page {
        width:100%;
    }

    .tab-content, #account-vertical-email, #account-vertical-password {
        margin-top:0px;
    }

    .right-content-card-section-container {
        width:100%;
    }

    #basic-info-form .row .form-group, #change-password-form .row .form-group, #account-vertical-email .row .form-group {
        width:96%;
    }

    .card-body {
        padding:0px !important;
    }

    .cards-wrapper .content-txt.mx-auto {
        width:100%;
    }

    .description-container .d-title, .single-section-content h3, .card-header h3.font-ml {
        font-size:18px !important;
        line-height: 20px;
    }

    .description-container .font-medium-2, .single-section-content p, .single-section-content .g-text, .link-list-item a.g-text, .single-section-content .d-text {
        font-size:14px !important;
    }

    .single-section-content p, .single-section-content .g-text {
        line-height: 20px;
    }

    .heading div {
        margin-bottom: 30px;
    }

    .content-pts svg {
        margin-top: 1px !important;
    }

    .link-list-item i {
        margin-top:-2px;
        font-size: 12px !important;
    }

    #quiz-layout {
        width: 100%;
    }

    .page-head {
        margin-left: 10px;
        margin-top:0px;
    }

    .card-footer.section-controls {
        margin-left:0px;
    }
    .page-head .text-black {
        font-size: 20px !important;
    }
    .card.text-left .card-header, .card-body.single-quiz-content h3, .row.attempt-container .font-m  {
        font-size:18px;
    }
    .card-body.text-black.single-quiz-content.font-s, .card-header.font-ml, .text-black.float-left.font-l,.row.attempt-container .attempt, .row.card-header.input-parents .fw-bold, .text-dark{
        font-size:14px;
        line-height:20px;
    }
    .dashboard-row {
      padding-left: 0px;
      padding-right:0px;
    }
    .quiz-question-list-input input {
      margin-top:0px;
      margin-right:0px;
      top:5px;
    }
    .quiz-question-list-style {
    margin-top: -1px !important;
    }

    .ffn-fav {
    font-size: 12px;
    height: 24px;
    width: 68px;
    }

    .ffn-margin{
      margin-right:2.5%;
    }

    .ffn-fav::before {
    content: "";
    width: 6px;
    height: 6px;
    background-color: white;
    border-radius: 100%;
    position: absolute;
    right: 1px;
    }

    .ffn-fav::after {
    border-top: 12px solid transparent;
    border-bottom: 12px solid transparent;
    border-left: 12px solid forestgreen;
    right: -12px;
}

.ffn-container {
  margin-top: 0px;
}

#section-controls a .btn-txt, .start-quiz .btn-txt, .submit-quiz, .reset-quiz, .btn-bitbucket {
  font-size: 14px;
  padding: 8px 24px !important;
    display: block;
    line-height: 20px !important;
}
.attempt-container div:nth-of-type(1) {
  margin-bottom:0px;
}
.attempt-container {
  margin-bottom: 0px;
}
.module-title-change, .dashboard-final-result {
  font-size:22px;
}
.dashboard-card-container {
  margin-bottom:0px;
}
.final-exams-content .title {
  margin-top:0px;
  margin-bottom:30px;
}
}

@media  only screen and (max-width:740px){
    #score-finder-form {
        margin-top:15px;
    }
}


@media  only screen and (max-width:600px){
    .card {
        margin: 20px 0px 0px 0px;
    }

    .final-exams-content {
        margin-top:0px !important;
    }

    .content-wrapper {
        padding-bottom:20px;
    }

    .student-module-head-name, .student-module-head-title, .card-body p, .quiz-based-card > div {
        font-size: 14px;
        line-height:19px;
    }

    .title {
        font-size:18px;
    }

    .footer .clearfix {
        font-size: 12px;
    }

    .footer span i {
        font-size: 14px !important;
    }

    #quiz-layout .card .card-header {
        margin-top:15px;
        margin-bottom:15px;
        line-height:20px;
    }

    .card-body.single-quiz-content h3 {
        padding-top:20px;
    }

    .instruction-container li {
        margin-bottom: 10px;
    }

    .instruction-container {
        margin-bottom:0px;
    }
    #dashboard-footer-green-text {
      font-size: 12px !important;
    }
    .link-list-item .ffn-fav {
    top: 0px;
  }
  .card-image img {
    max-height: 90em;
}
.single-section-content span .g-text {
  line-height:1.5;
}
.toast {
  margin-top:45px !important;
}
}

@media  only screen and (max-width:575px){
    #basic-info-form .row .form-group, #change-password-form .row .form-group, #account-vertical-email .row .form-group {
        margin-bottom:10px;
    }
    .link-list-item .ffn-fav {
    font-size: 12px;
    height: 24px;
}
.d-text br {
  display:none;
}
}

@media  only screen and (max-width:520px){
  .ffn-fav {
    margin-left:0px;
  }
}

@media  only screen and (max-width: 500px){
    #quiz-layout .card {
        padding:20px;
    }
    .quiz-question-list-container {
        margin: 5px !important;
    }
}

@media  only screen and (max-width:480px){
    #section-controls a {
        padding: 10px 30px;
    }
    .start-quiz {
        padding:2px 13px;
    }
    .card-footer.section-controls {
        padding-top:0px;
    }
    .book span.d-text {
        line-height:20px;
    }
    .single-section-content .book {
        margin-top:5px !important;
        margin-bottom:5px !important;
    }
    .card-header .font-ml {
        line-height:24px;
    }
    .justify-content-start #section-controls button {
      padding:10px 30px;
    }
    .quote-author {
      font-size:14px;
    }
    #dashboard-footer-green-text {
      margin-left: 0px !important;
    }
    .ffn-fav, .link-list-item .ffn-fav{
    font-size: 8px;
    height: 0px;
    width: 60px;
}
.ffn-fav::after {
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    border-left: 10px solid forestgreen;
    right: -10px;
}
.single-section-content h4 {
  line-height:20px;
}
.quiz-score-after-result .attemp-last-para {
    font-size: 14px !important;
}
}

@media  only screen and (max-width:460px){
  .ffn-fav {
    font-size: 10px;
    height: 20px;
    width: 60px;
}
.ffn-margin{
  margin-right:3.5%;
}
}

@media  only screen and (max-width:440px){
  .footer-br-display {
    display: block;
  }
  .margin-left-none {
    margin-left: 0px !important;
  }
}

@media  only screen and (max-width:400px){
    .card {
        padding: 20px;
    }

    #section-controls {
        margin-top:20px !important;
    }

    .link-list-item .ffn-fav {
    margin-right:0px;
    }
}

@media  only screen and (max-width:380px){
  .quiz-score-after-result .attemp-last-para {
    font-size: 13px !important;
}
}

@media  only screen and (max-width:340px){
  .ffn-fav {
    font-size: 10px;
    height: 20px;
    width: 60px;
}
}
.main-menu span.quiz-readed, .main-menu span.quiz-completed {
  color:rgb(255,255,255, 0.4) !important;
}
</style>
<div class="main-menu menu-fixed <?php echo e((($configData['theme'] === 'dark') || ($configData['theme'] === 'semi-dark')) ? 'menu-light' : 'menu-dark'); ?> site-prefer-black menu-accordion menu-shadow"
    data-scroll-to-active="true">
    <div class="navbar-header">
        <div class="brand-logo">
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                <div class="d-flex">
                    <div class="logo-icon">
                        <img src="<?php echo e(asset('images/logo/sidebar_logo.png')); ?>" alt="Website Logo" height="65px"
                            width="65px">
                    </div>

                    <div class="ms-1 logo-txt">
                        <img src="<?php echo e(asset('images/logo/sidebar_logo_txt.png')); ?>" alt="Website Name">
                    </div>

                </div>

            </a>
        </div>
        
    </div>
    
    <div class="divider border-bottom-dark"></div>
    <div class="main-menu-content scroll-menu">
     
        <ul class="navigation  site-prefer-black" id="main-menu-navigation" data-menu="menu-navigation">
            

            <?php if(isset($menuData[0])): ?>
            <?php $__currentLoopData = $menuData[0]->menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $menu = (object)$menu;
            ?>

            <?php if(isset($menu->navheader)): ?>
            <li class="navigation-header">
                <span><?php echo e(__($menu->navheader)); ?></span>
                <i data-feather="more-horizontal"></i>
            </li>
            <?php else: ?>
            
            <?php
            $custom_classes = "";

            if(isset($menu->classlist)) {
            $custom_classes = $menu->classlist;
            }
            $course_text = "";
            if(isset($menu->textClass)){
            $course_text = $menu->textClass;
            }
            ?>
            <li class="module-title nav-item    <?php if(isset($module)): ?>
            <?php if('/'.Request::path().'/'.$module->id == $menu->url): ?> <?php echo e('active open'); ?> <?php else: ?> '' <?php endif; ?>
            <?php endif; ?> <?php echo e($custom_classes); ?> <?php echo e(Route::currentRouteName() === $menu->slug ? 'active' : ''); ?> <?php echo e('/'.Request::path() == $menu->url ? 'active-url open active':''); ?>">
                
                
                
                <a href="<?php echo e(isset($menu->url)? url($menu->url):'javascript:void(0)'); ?>" class="d-flex"
                    target="<?php echo e(isset($menu->newTab) ? '_blank':'_self'); ?>">
                    <i class="fw-bolder text-yellow <?php echo e($menu->icon); ?>"></i>
                    <span class="menu-title text-wrap <?php echo e($course_text); ?>"
                    <?php if(isset($menu->moduleComplete) ): ?>
                    style= "text-decoration:none !important";
                  <?php endif; ?>
                 onclick="moduleInfo(this)"><?php echo e(__($menu->name)); ?></span>
                    <?php if(isset($menu->badge)): ?>
                    <?php $badgeClasses = "badge rounded-pill badge-light-primary ms-auto me-1" ?>
                    <span
                        class="<?php echo e(isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses); ?>"><?php echo e($menu->badge); ?></span>
                    <?php endif; ?>
                </a>
                <?php if(isset($menu->submenu)): ?>
                <?php echo $__env->make('panels/submenu', ['menu' => $menu], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>

                <!-- <?php if(isset($menu->addDivider)): ?>
          <div class="divider border-bottom-dark"></div>
        <?php endif; ?> -->
        <?php if(isset($menuData[0]->menu[0]['my-couse-navbar']) && !isset($is_teacher)): ?>
                <?php if($menuData[0]->menu[0]['my-couse-navbar'] === true): ?>

                    <i class="fi fi-br-plus-small plus-icon clicked-button"></i>

                    <i class="fi fi-br-minus-small minus-icon clicked-button"></i>

                    <?php endif; ?>
                    <?php endif; ?>
            </li>
            <div class="divider border-bottom-dark"></div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            

            <li class="nav-item d-xl-none">
                <a class="nav-link d-flex align-items-center" id="dropdown-user" href="javascript:void(0);"
                    data-bs-toggle="dropdown" aria-haspopup="true">
                    <img class="rounded mr-1" src="<?php echo e(auth()->user()->profileImage()); ?>" alt="avatar" height="30px"
                        width="30px">
                    <span class="fw-bolder text-white">
                        <?php echo e(auth()->user()->fullName()); ?>

                    </span>
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">

                    <a class="dropdown-item fw-bolder text-black" href="<?php echo e(route('account.index')); ?>">
                        <i class="me-50" data-feather="user"></i> Profile
                    </a>



                    <form class="d-none" id="main-logout-form-small" data-btnload="true" method="POST"
                        action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                    </form>
                    <a class="dropdown-item fw-bolder text-black log-out" href="logut-me"
         >
                        <i class="me-50" data-feather="power"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
<script src="<?php echo e(asset('vendors/js/jquery/jquery.min.js')); ?>"></script>
<link rel="stylesheet" href="<?php echo e(asset('vendors/css/extensions/sweetalert2.min.css')); ?>">
<script src="<?php echo e(asset('vendors/js/extensions/sweetalert2.all.min.js')); ?>"></script>
<script >

    $('.log-out').click((e)=>{
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure you want to log out?',
            showDenyButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: 'No',
            confirmButtonColor: '#228b22',

            customClass: {
                actions: 'my-actions',
                cancelButton: 'order-1 right-gap',
                confirmButton: 'order-2',
                denyButton: 'order-3',
            }
            }).then((result) => {
            if (result.isConfirmed) {
                $('#main-logout-form').submit();
            }
            else if (result.isDenied) {
            }
            })

    })
</script>

<script>
  
// const getScreenWidth = () => {

// if($(window).width() >= 320 && $(window).width() <= 480 )
// { return screenValue=250; } 
// else if($(window).width()>= 481 && $(window).width() <= 769 )
// { return screenValue=150; }
//  else if($(window).width()>= 770 && $(window).width() <= 1023 )
//  { return screenValue=190; } 
//  else if($(window).width()>= 1024 && $(window).width() <= 1279 )
//  { return screenValue=270; }
//   else if($(window).width()>= 1280 && $(window).width() <= 1599 )
//   { return screenValue=270; }
//    else if($(window).width()>= 1600 && $(window).width() <= 1919 )
//    { return screenValue=270; }
//     else if($(window).width()>= 1920 )
//   {  return screenValue = 300;  }
//   }

      function moduleInfo(url){
      var url= $(url).parent().closest('a').attr('href')
      window.location.href= url;
      }

      $('.clicked-button').click(function(e){
        // srollUpdate($(this))
        // console.log($(e))
        e.stopPropagation()
        $(this).parent().toggleClass('open')
        // scrollSidebar($(this),getScreenWidth())
      });

  // function scrollSidebar(el, screenVal)
  // {
  //   console.log(screenVal)
  //   console.log($('.scroll-menu').scrollTop()+el.offset().top)
  //   console.log($('.scroll-menu').scrollTop()+el.offset().top-screenVal)
  //     setTimeout(function(){
  //     $('.scroll-menu').animate({
  //        scrollTop: $('.scroll-menu').scrollTop()+el.offset().top-screenVal
  //     }, 500);
  //     }, 500);
  // }

  </script>
<?php /**PATH /home/customer/www/zeroguess.us/public_html/n17/FFN/app/resources/views/panels/sidebar.blade.php ENDPATH**/ ?>