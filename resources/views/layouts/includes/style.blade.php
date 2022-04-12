<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<!-- Nucleo Icons -->
<link href="{{ asset('asset/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/nucleo-icons.css') }} " rel="stylesheet" />
<link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/css/style.css') }}" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
<!-- CSS Files -->
<link id="pagestyle" href="{{ asset("../assets/css/argon-dashboard.css?v=2.0.0") }}" rel="stylesheet" />
<style>
    .projects{
        /* background-color: #000016; */
    }
    .projects .content{
margin-top: -18px;
    }
    .project-card{
        background-color: #f8f9fa;
    border: 1px solid #e6e6e6;
    min-height: 0em;
    width: 13em;
    overflow: hidden;
    border-radius: 50px;
    margin: 10px;
        transition: 0.7s ease;
    }
    .project-card:hover {
        transform:scale(1.1);
    }
    .project-card:hover  .project-image {
        opacity: 0.9;
    }
    .project-image img{
        width: 100%;
    }
    .project-info{
        padding:1em;
    }
    .project-category{
        font-size:15px;
        color: #000;
        text-align: center;

    }
    .project-title{
        display: flex;
        justify-content:space-between;
        /* text-transform: uppercase; */
        font-weight:800;
        margin-top: 10px;
    }
    .more-details{
        text-decoration: none;
        color:#3a6cf4;
    }
    .more-details:hover{
        color:#601cfc;
    }
    .more-add{
        text-decoration: none;
        color:#08931d;
    }
    .more-add:hover{
        color:#2c8904;
    }

    .mt-3 {
    margin-top: 1rem !important;
    text-align: -webkit-center;
}
.save{
    text-align: center;
}


*{
    box-sizing: border-box;
}
$purple1: #0C132F;
$purple2: #824970;
$blue1: #19234D;
$blue2: #D2D4DE;
$orange1: #F3851F;
$green1: #1CCA00;
$green2: #A89949;
$green3: #163026;
$green4: #169061;
// http://co0kie.github.io/codepen/mindful/

body{
  height: 100vh;
  margin: 0;
  padding: 0;
  background-color: #211d1d;
  font-family: 'Robot', sans-serif;
}

.wrap{
  display: flex;
  height: 100vh;
  margin: 0 auto;
  max-width: 840px;
}

.container{
  width: 375px;
  height: 680px;
  margin: auto;
  border-radius: 30px;
  background-repeat: no-repeat;
}

.landscape-1{
  background-image: url('http://co0kie.github.io/codepen/mindful/landscape.jpg');
  background-size: 770px;
  background-position: -392px -88px;
  background-color: $purple1;
}

.landscape-2{
  background-image: url('http://co0kie.github.io/codepen/mindful/landscape2.jpg');
  background-size: 1050px;
  background-position: -332px -1px;
}

.top{
  margin: 110px 40px 0;
  color: white;
  > time{
    font-size: 16px;
  }
  .light &{
    color: #000;
  }
  [type="checkbox"]{
    display: none;
  }
  .switch{
    position: relative;
    width: 60px;
    border-radius: 20px;
    height: 30px;
    background-color: #fff;
    display: block;
    margin-top: 20px;
    transition: 200ms;
    &::before{
      content: '';
      position: absolute;
      background-color: $green1;
      transition: 200ms;
      width: 28px;
      height: 28px;
      border-radius: 50%;
      top: 0;
      bottom: 0;
      margin: auto;
      left: 1px;
      box-shadow: 0 1px 2px 1px rgba(0,0,0,0.17);
    }
  }
  [type="checkbox"]:checked{
    ~ .switch{
      background-color: $green1;
      &::before{
        content: '';
        background-color: #fff;
        left: 31px;
      }
    }
  }
}

.title{
  margin-bottom: 10px;
  font-weight: 400;
  font-size: 32px;
}

.notification{
  background-color: #fff;
  width: 80%;
  margin: auto;
  padding: 15px;
  border-radius: 10px;
  font-size: 13px;
  margin-top: 40px;
  display: flex;
  align-items: center;
  box-shadow: 0 2px 10px 0 $purple2;
  > p{
    margin: 0;
  }
  > p > strong{
    display: block;
    color: $orange1;
    font-weight: 400;
    margin-bottom: 5px;
  }
  > p img{
    width: 17px;
    vertical-align: bottom;
    margin-right: 3px;
  }
  > small{
    margin-left: auto;
  }
}

.heading{
  color: white;
  font-size: 22px;
  font-weight: 400;
  position: relative;
  > button{
    position: absolute;
    background-color: $green4;
    border: 0;
    padding: 10px;
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
    color: white;
    font-size: 27px;
    line-height: 1;
    height: 43px;
    right: -40px;
    top: -7px;
    width: 50px;
  }
}

.content{
  padding: 0 40px;
  margin-top: 130px;
}

.slides{
  display: flex;
  margin-top: 30px;
}

.article{
  display: flex;
  align-items: center;
  background-color: $blue1;
  padding: 30px 20px;
  border-radius: 10px;
  width: 100%;
  position: relative;
  &::before{
    content: '';
    position: absolute;
    right: -40px;
    height: 100%;
    width: 20px;
    background-color: $blue1;
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
  }
  > img{
    width: 30px;
    margin-right: 20px;
    &:hover{
      filter: grayscale(100%) sepia(100%);
    }
  }
  > .text > h6{
    color: white;
    font-size: 14px;
    margin: 0 0 8px;
    font-weight: 400;
  }
  > .text > p{
    color: $blue2;
    font-size: 11px;
    margin: 0;
  }
}

.navigation{
  background-color: $blue1;
  padding: 15px 0;
  border-radius: 50px;
  margin: 40px 10px;
  display: flex;
  justify-content: space-around;
  > a > img{
    width: 26px;
    transition: 200ms;
  }
  > a:hover > img{
    filter: invert(0.6) sepia(1) hue-rotate(350deg) saturate(9);
  }
  .light &{
    background-color: $green3;
    > a:hover > img{
      filter: invert(0.6) sepia(1) hue-rotate(370deg) saturate(200);
    }
  }
}

.timeline{
  margin: 10px 0 67px;
  > .item > ul{
    list-style-type: none;
    margin: 0;
    padding: 0;
    position: relative;
  }
  ul{
    &::before{
      content: '';
      height: 22%;
      width: 1px;
      background-color: $green2;
      position: absolute;
      top: 0;
      bottom: 0;
      margin: auto;
      left: 22px;
      z-index: 0;
    }
  }
  li{
    display: flex;
    align-items: center;
    color: white;
    + li{
      margin-top: 10px;
      opacity: .5;
    }
  }
  li > img{
    width: 45px;
    background-color: $green2;
    border-radius: 50%;
    padding: 8px;
    margin-right: 11px;
  }
  li > p{
    font-size: 14px;
  }
  li > p span{
    color: rgba(255,255,255, 0.55);
  }
  li strong{
    display: block;
    font-weight: 600;
    letter-spacing: 1px;
    margin-bottom: 4px;
  }
  li > small{
    margin-left: auto;
  }
}

.border-radius-xl {
    border-radius: 0.75rem;
}
.icon-lg {
    width: 64px;
    height: 64px;
}
.icon-shape {
    width: 48px;
    height: 48px;
    background-position: center;
    border-radius: 0.5rem;
}
.bg-gradient-dark {
    background-image: linear-gradient(195deg, #42424a 0%, #191919 100%);
}
.shadow-dark {
    box-shadow: 0 4px 20px 0 rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(64 64 64 / 40%) !important;
}
.text-center {
    text-align: center !important;
}
.mt-n4 {
    margin-top: -1.5rem !important;
}
.position-absolute {
    position: absolute !important;
}
.icon {
    fill: currentColor;
    stroke: none;
}
.icon-lg {
    height: 1.6em;
    width: 1.6em;
}
.icon {
    display: inline-block;
    color: #111111;
    height: 1em;
    width: 1em;

}








*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
@font-face {
    font-family: pop;
    src: url(./Fonts/Poppins-Medium.ttf);
}

.main{
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: pop;
    flex-direction: column;
}
.head{
    text-align: center;
}
.head_1{
    font-size: 30px;
    font-weight: 600;
    color: #333;
}
.head_1 span{
    color: #ff4732;
}
.head_2{
    font-size: 16px;
    font-weight: 600;
    color: #333;
    margin-top: 3px;
}
ul{
    display: flex;
    margin-top: 80px;
}
ul li{
    list-style: none;
    display: flex;
    flex-direction: column;
    align-items: center;
}
ul li .icon{
    font-size: 35px;
    color: #ff4732;
    margin: 0 60px;
}
ul li .text{
    font-size: 14px;
    font-weight: 600;
    color: #ff4732;
}

/* Progress Div Css  */

ul li .progress{
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: rgba(68, 68, 68, 0.781);
    margin: 14px 0;
    display: grid;
    place-items: center;
    color: #fff;
    position: relative;
    cursor: pointer;
}
.progress::after{
    content: " ";
    position: absolute;
    width: 125px;
    height: 5px;
    background-color: rgba(68, 68, 68, 0.781);
    right: 30px;
}
.one::after{
    width: 0;
    height: 0;
}
ul li .progress .uil{
    display: none;
}
ul li .progress p{
    font-size: 13px;
}

/* Active Css  */

ul li .active{
    background-color: #ff4732;
    display: grid;
    place-items: center;
}
li .active::after{
    background-color: #ff4732;
}
ul li .active p{
    display: none;
}
ul li .active .uil{
    font-size: 20px;
    display: flex;
}

/* Responsive Css  */

@media (max-width: 980px) {
    ul{
        flex-direction: column;
    }
    ul li{
        flex-direction: row;
    }
    ul li .progress{
        margin: 0 30px;
    }
    .progress::after{
        width: 5px;
        height: 55px;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        z-index: -1;
    }
    .one::after{
        height: 0;
    }
    ul li .icon{
        margin: 15px 0;
    }
}

@media (max-width:600px) {
    .head .head_1{
        font-size: 24px;
    }
    .head .head_2{
        font-size: 16px;
    }
}




* {
    margin: 0;
    padding:0;
    box-sizing: border-box;
    font-family: 'Poppins' , sans-serif;

    }

    :root{
        --clr:#fff;
    }
    body{
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: var(--clr);
    }
    .navigations
    {
        position: relative;
        width: 357px;
        height: 70px;
        background: rgb(230, 226, 226);
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        margin: -4px -4px;

    }
    .navigations ul {
        display: flex;
        width: 350px;

    }
    .navigations  ul li {
        position: relative;
        list-style:none;
        width: 70px;
        height: 70px;
        z-index: 1;
    }

    .navigations  ul li  a {

        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        width: 100%;
        text-align: center;
        font-weight: 500;
    }
    .navigations  ul li  a  .icon{
        position: relative;
        display: block;
        line-height: 75px;
        font-size: 1.5em;
        text-align: center;
        transition: 0.5s;
        /* --clr:#fff;/ */
        color: black;
    }
    .navigations  ul li.active  a  .icon{
        transform: translateY(-32px);
    }
    .navigations  ul li  a .text{
        position: absolute;
        color: black;
        font-weight: 400;
        font-size: 0.75em;
        letter-spacing: 0.5em;
        transition: 0.5s;
        opacity: 0.1 !important ;
        transform: translateY(20.1px) !important;
    }

    .navigations  ul li.active a .text
    {
        opacity:1.1 !important;
        transform: translateY(10px) !important;
    }
    .indicator
    {
        position: absolute;
        top: -40px;
        width: 70px;
        height: 70px;
        background: #29fd53;
        border-radius: 50%;
        border: 6px  solid #f1f0e8;
        transition: 0.5s;

    }
    .indicator::before{
        content: '';
        position: absolute;
        top: 50%;
        left: -22px;
        width: 20px;
        height: 20px;
        background: transparent;
        border-top-right-radius: 20px;
        box-shadow: 1px -10px 0 0 #f1f0e8;

    }
    .indicator::after{
        content: '';
        position: absolute;
        top: 50%;
        right: -22px;
        width: 20px;
        height: 20px;
        background: transparent;
        border-top-left-radius: 20px;
        box-shadow:-1px -10px 0 0 #f1f0e8;

    }
    .navigations  ul li:nth-child(1).active ~ .indicator{
        transform:  translateX(calc(70px * 0));
    }
    .navigations  ul li:nth-child(2).active ~ .indicator{
        transform:  translateX(calc(70px * 1));
    }
    .navigations  ul li:nth-child(3).active ~ .indicator{
        transform:  translateX(calc(70px * 2));
    }
    .navigations  ul li:nth-child(4).active ~ .indicator{
        transform:  translateX(calc(70px * 3));
    }
    .navigations  ul li:nth-child(5).active ~ .indicator{
        transform:  translateX(calc(70px * 4));
    }

</style>
<link id="pagestyle" href="{{ asset('../assets/css/argon-dashboard.css?v=2.0.0') }}" rel="stylesheet" />
