<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <script src="https://getbootstrap.com/docs/5.3/assets/js/color-modes.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.118.2">
  <title>Signin Template · Bootstrap v5.3</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">



  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

  <link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    html,
    body {
      height: 100%;
    }

    .form-signin {
      max-width: 330px;
      padding: 1rem;
    }

    .form-signin .form-floating:focus-within {
      z-index: 2;
    }

    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }

    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      width: 100%;
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
      --bd-violet-bg: #712cf9;
      --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

      --bs-btn-font-weight: 600;
      --bs-btn-color: var(--bs-white);
      --bs-btn-bg: var(--bd-violet-bg);
      --bs-btn-border-color: var(--bd-violet-bg);
      --bs-btn-hover-color: var(--bs-white);
      --bs-btn-hover-bg: #6528e0;
      --bs-btn-hover-border-color: #6528e0;
      --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
      --bs-btn-active-color: var(--bs-btn-hover-color);
      --bs-btn-active-bg: #5a23c8;
      --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
      z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
      display: block !important;
    }
  </style>


  <!-- Custom styles for this template -->
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
  <?php include('darkmode.php'); ?>



  <main class="form-signin w-100 m-auto">
    <form id="join_form" method="post" action="join_ok.php">
      <h1 class="h3 mb-3 fw-normal">회원가입</h1>

      <div class="form-floating">
        <input type="text" class="form-control" id="id" name="id" placeholder="아이디" style="
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;">
        <label for="id">아이디</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="nickname" name="nickname" placeholder="닉네임" style="border-radius:0px !important">
        <label for="nickname">닉네임</label>
      </div>
      <div class="form-floating mb-0">
        <input type="password" class="form-control mb-0" id="pwd" name="pwd" placeholder="비밀번호" style="border-radius:0px !important">
        <label for="pwd">비밀번호</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="pwd2" placeholder="비밀번호 확인">
        <label for="pwd2">비밀번호 확인</label>
      </div>

      <button class="btn btn-primary w-100 py-2" type="submit">회원가입</button>
      <div class="form-check text-center my-3 ps-0">
        <a href="login.php">로그인</a>
      </div>

    </form>
  </main>
  <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function(){
      $("#join_form").on("submit", function() {
        if($("#pwd").val() != $("#pwd2").val()) {
          alert("비밀번호를 확인해 주세요.");
          return false;
        }
      });
    });
  </script>
</body>

</html>