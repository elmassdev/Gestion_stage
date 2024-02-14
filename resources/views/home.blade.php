@extends('layouts.app')
@section('content')


<style>
    .dep {
        font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 36px;
        font-weight: bolder;
        color: rgb(157, 157, 157);
        padding: 2%;
        height: 10vh;
        padding-left: 10%;
    }
    .menu{
        margin-right: 35%;
        margin-top: 5%;
        font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
    .container {
      display: flex;
      flex-wrap: wrap;
      max-width: 80%;
      margin: 0 auto;
    }

    .square {
      width: calc(31% - 2px);
      height: 150px;
      box-sizing: border-box;
      transition: background-color 0.3s;
      transition: font-size 2s ease;
      transition: font-size 2s ease;
      display: flex;
      align-items: center;
      gap: 28px;
      border-radius: 5%;
      position: relative;
      z-index: 1;
      box-shadow: 6px 28px 46px -6px #bebbbb;
       margin:1%;
    }
    .square:hover{
        transform: scale(1.1);
        background-color: rgb(221, 164, 49);
    }
    .square::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    border-radius: 1rem;
    background: linear-gradient(135deg, #f27121, #000000 40%);
    z-index: -2;
  }
  .square::after {
    content: '';
    position: absolute;
    left: 1px;
    top: 1px;
    width: calc(100% - 1px);
    height: calc(100% - 1px);
    border-radius: 1rem;
    background: linear-gradient(90deg, #171721, #060609);
    transition: box-shadow 0.3s ease;
    z-index: -1;
  }

  .square .info {
    display: flex;
    flex-flow: column nowrap;
    margin-left: 3%;
  }

  .square .info .sub {
    color: #ff7a00;
    line-height: 28px;
    font-size: 14px;
    font-weight: 400;
  }

  .square .info .title {
    max-width: 260px;
    line-height: 28px;
    font-size: 17px;
    font-weight: 500;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .square .info .btn {
    margin-top: 28px;
    color: #fff;
    background: transparent;
    border: unset;
    border-radius: 16px;
    overflow: hidden;
    padding: 12px 24px;
    font-weight: 600;
    font-size: 16px;
    margin-right: auto;
    cursor: pointer;
    position: relative;
    z-index: 0;
    transition: background 0.3s ease;
  }

  .square .info .btn::before,
  .square .info .btn::after {
    content: '';
    position: absolute;
  }

  .square .info .btn::before {
    left: 50%;
    top: 50%;
    background: linear-gradient(90deg, #ff7a00 0%, transparent 45%, transparent 55%, #ff7a00 100%);
    transform: translate(-50%, -50%) rotate(55deg);
    width: 100%;
    height: 240%;
    border-radius: 16px;
    z-index: -2;
    opacity: 0.4;
    transition: all 0.3s ease;
    animation: 5s move infinite linear paused;
  }

  .square .info .btn::after {
    left: 2px;
    top: 2px;
    background: #171721;
    width: calc(100% - 4px);
    height: calc(100% - 4px);
    border-radius: 16px;
    z-index: -1;
  }

  .square .info .btn:hover::before {
    animation-play-state: running;
    opacity: 1;
  }

  .square .image {
    min-width: 86px;
    min-height: 86px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    box-shadow: 8px 12px 16px #000;
    position: relative;
    z-index: 0;
  }

  .square .image::before {
    content: '';
    position: absolute;
    background: linear-gradient(110deg, #ff7a00 10%, #000000);
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    z-index: -2;
  }

  .square .image::after {
    content: '';
    position: absolute;
    left: 1px;
    top: 1px;
    width: calc(100% - 1px);
    height: calc(100% - 1px);
    border-radius: 50%;
    background: linear-gradient(90deg, #12121a, #030303);
    box-shadow: 6px 6px 14px -6px #f2712150 inset;
    z-index: -1;
  }

  .square .image > i {
    font-size: 30px;
    color: #ff7a00;
  }

  @keyframes move {
    0% {transform: translate(-50%, -50%)  rotate(55deg);}
    100% {transform: translate(-50%, -50%)  rotate(415deg);}
  }
    @media (max-width: 600px) {
      .square {
        width: calc(50% - 2px); /* Adjust for border width */
        height: 150px; /* Adjust as needed */
        font-size: 1rem;
      }
    }

    @media (max-width: 400px) {
      .square {
        width: calc(100% - 2px); /* Adjust for border width */
        height: 100px; /* Adjust as needed */
      }
    }
  </style>

 <div id="home">
    <div class="row">
        <h1 class="dep"> Département Développement RH  </h1>
    </div>

  <div class="menu">
    <div class="container">
        @if(auth()->check() && auth()->user()->hasRole('admin'))
        <div class="square">
            <div class="info">
                <a class="btn col-md-12" href="/stagiaires/create"> Nouveau</a>
              </div>
              <div class="image">
                <svg xmlns="http://www.w3.org/2000/svg" height="32" width="28" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff7a00" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
              </div>
        </div>
        <div class="square">
            <div class="info">
                <a class="btn col-md-12" href="/indicators/index"> Indicateurs</a>
              </div>
              <div class="image">
                <svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff7a00" d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V400c0 44.2 35.8 80 80 80H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H80c-8.8 0-16-7.2-16-16V64zm406.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L320 210.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L240 221.3l57.4 57.4c12.5 12.5 32.8 12.5 45.3 0l128-128z"/></svg>
              </div>
        </div>
        <div class="square">
            <div class="info">
                <a class="btn col-md-12" href="/stagiaires"> Stagiaires</a>
              </div>
              <div class="image">
                <svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff7a00" d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z"/></svg>
              </div>
        </div>
        <div class="square">
            <div class="info">
                <a class="btn col-md-12" href="/export"> Sauvegarde</a>
              </div>
              <div class="image">
                <svg xmlns="http://www.w3.org/2000/svg" height="32" width="28" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff7a00" d="M448 80v48c0 44.2-100.3 80-224 80S0 172.2 0 128V80C0 35.8 100.3 0 224 0S448 35.8 448 80zM393.2 214.7c20.8-7.4 39.9-16.9 54.8-28.6V288c0 44.2-100.3 80-224 80S0 332.2 0 288V186.1c14.9 11.8 34 21.2 54.8 28.6C99.7 230.7 159.5 240 224 240s124.3-9.3 169.2-25.3zM0 346.1c14.9 11.8 34 21.2 54.8 28.6C99.7 390.7 159.5 400 224 400s124.3-9.3 169.2-25.3c20.8-7.4 39.9-16.9 54.8-28.6V432c0 44.2-100.3 80-224 80S0 476.2 0 432V346.1z"/></svg>
              </div>
        </div>
        <div class="square">
            <div class="info">
                <a class="btn col-md-12  " href="/stagiaires/1"> Rechercher</a>
              </div>
              <div class="image">
                <svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff7a00" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
              </div>
         </div><div class="square">
            <div class="info">
                <a class="btn col-md-12" href="/encadrants/1"> Encadrants</a>
              </div>
              <div class="image">
                <svg xmlns="http://www.w3.org/2000/svg" height="32" width="36" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff7a00" d="M256 32c-17.7 0-32 14.3-32 32v2.3 99.6c0 5.6-4.5 10.1-10.1 10.1c-3.6 0-7-1.9-8.8-5.1L157.1 87C83 123.5 32 199.8 32 288v64H544l0-66.4c-.9-87.2-51.7-162.4-125.1-198.6l-48 83.9c-1.8 3.2-5.2 5.1-8.8 5.1c-5.6 0-10.1-4.5-10.1-10.1V66.3 64c0-17.7-14.3-32-32-32H256zM16.6 384C7.4 384 0 391.4 0 400.6c0 4.7 2 9.2 5.8 11.9C27.5 428.4 111.8 480 288 480s260.5-51.6 282.2-67.5c3.8-2.8 5.8-7.2 5.8-11.9c0-9.2-7.4-16.6-16.6-16.6H16.6z"/></svg>
              </div>
        </div>
        <div class="square">
            <div class="info">
                <a class="btn col-md-12" href="/indicators/graph"> Diagrammes</a>
              </div>
              <div class="image">
                <svg xmlns="http://www.w3.org/2000/svg" height="32" width="36" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff7a00" d="M304 240V16.6c0-9 7-16.6 16-16.6C443.7 0 544 100.3 544 224c0 9-7.6 16-16.6 16H304zM32 272C32 150.7 122.1 50.3 239 34.3c9.2-1.3 17 6.1 17 15.4V288L412.5 444.5c6.7 6.7 6.2 17.7-1.5 23.1C371.8 495.6 323.8 512 272 512C139.5 512 32 404.6 32 272zm526.4 16c9.3 0 16.6 7.8 15.4 17c-7.7 55.9-34.6 105.6-73.9 142.3c-6 5.6-15.4 5.2-21.2-.7L320 288H558.4z"/></svg>
              </div>
        </div>
        @endif

        @if(auth()->check() && auth()->user()->hasRole('superadmin'))
        <div class="square">
            <div class="info">
                <a class="btn col-md-12" href="/user/assign-roles"> Menu Admin</a>
              </div>
              <div class="image">
                <svg xmlns="http://www.w3.org/2000/svg" height="32" width="28" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff7a00" d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>
            </div>
        </div>
        @endif

        @can('view_surete_page')
        <div class="square">
            <div class="info">
                <a class="btn col-md-12" href="/surete"> Canevas</a>
            </div>
            <div class="image">
            <svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff7a00" d="M256 0c4.6 0 9.2 1 13.4 2.9L457.7 82.8c22 9.3 38.4 31 38.3 57.2c-.5 99.2-41.3 280.7-213.6 363.2c-16.7 8-36.1 8-52.8 0C57.3 420.7 16.5 239.2 16 140c-.1-26.2 16.3-47.9 38.3-57.2L242.7 2.9C246.8 1 251.4 0 256 0zm0 66.8V444.8C394 378 431.1 230.1 432 141.4L256 66.8l0 0z"/></svg>
            </div>
        </div>
        @endcan
      </div>
  </div>
 </div>

@endsection

