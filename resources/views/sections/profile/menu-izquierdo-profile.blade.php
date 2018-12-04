<div class="user-profile-box">
    <div class="header clearfix">
        <h2>Bienvenido, </h2>
        <h4 class="ng-binding">Guillermo Morillo</h4>
        <img src="/img/profiles/{{ Auth::user()->profile_img}}" alt="avatar" class="img-fluid profile-img">
    </div>
    <div class="detail clearfix">
        <div class="container">
            <form action="/profile" method="POST" enctype="multipart/form-data">
                @csrf
                <p class="m-0">Cambiar imágen de perfil</p>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input bnn btn-outline-secondary" name="profile_img" id="profile_img" required="required">
                        <label class="custom-file-label" for="profile_img"></label>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-outline-danger" type="submit">Enviar</button>
                    </div>
                </div>
                {{$errors->has('name')}}
            </form>
        </div>
        <div class="list-group pt-5" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action  MenuLeft" id="dashboard-list" data-toggle="list" role="tab" aria-controls="home"><i class="fas fa-chart-pie"></i>Principal</a>
            <a class="list-group-item list-group-item-action MenuLeft" id="list-profile-list" data-toggle="list" role="tab" aria-controls="profile"><i class="far fa-user"></i>Mi cuenta</a>
            <a class="list-group-item list-group-item-action MenuLeft" id="list-messages-list" data-toggle="list" role="tab" aria-controls="messages"><i class="fas fa-plus"></i>Agregar una propiedad</a>
            <a class="list-group-item list-group-item-action MenuLeft" id="list-settings-list" data-toggle="list" role="tab" aria-controls="settings"><i class="fas fa-home"></i>Mis propiedades</a>
            <a class="list-group-item list-group-item-action MenuLeft" id="password-change" target="_blank"><i class="fas fa-key"></i>Cambiar contraseña</a>
        </div>
    </div>
</div>

@section('stylesheet')
    <style>
        .user-profile-box {
            background: #fff;
            box-shadow: 0 0 20px rgba(38,38,38,.2);
            margin: 0 auto 50px;
        }
        .user-profile-box .header {
            padding: 30px 20px 120px;
            text-align: center;
            position: relative;
            background-repeat: no-repeat;
            border: none;
            margin: 0;
            background:linear-gradient( to bottom, rgba(0, 42, 104, 0.69), rgba(2, 146, 252, 0.51) ), url(http://tartanhomes.com/wp-content/uploads/2015/03/980x480_homes_Newburgh_A-480x260.jpg) top left repeat;
            background-size: cover;
            color: #fff;
        }
        .user-profile-box .header h2 {
            margin: 0 0 8px;
            color: #fff;
            font-size: 24px;
        }
        .user-profile-box .header h4 {
            font-size: 16px;
            color: #fff;
            font-weight: 400;
        }
        .user-profile-box .profile-img {
            border-radius: 50%;
            background-clip: padding-box;
            border: 5px solid #fff;
            bottom: -75px;
            float: left;
            height: 160px;
            width: 160px;
            left: 50%;
            margin-left: -75px;
            position: absolute;
            box-shadow: 0 0 0 0 rgba(0,0,0,.1), 0 3px 3px 0 rgba(0,0,0,.1);
            object-fit: cover;
        }
        .user-profile-box .detail {
            padding-top: 100px;
        }
        ul, ol {
            list-style: outside none none;
            margin: 0;
            padding: 0;
        }
        ul li, ol li {
            list-style: none;
        }
        .user-profile-box .detail ul li .active, .user-profile-box .detail ul li a:hover {
            color: #3490DD;
        }
        .user-profile-box .detail ul li .active {
            background: #fafafa;
            color: #3490DD;
            font-weight: 500;
        }
        .user-profile-box .detail ul li a:hover {
            background: #fafafa;
            color: #3490DD;
        }
        .user-profile-box .detail ul li a {
            color: #727272;
            border-bottom: 1px solid #f5f5f5;
            padding: 12px 20px;
            display: block;
            font-size: 14px;
            font-weight: 500;
        }
        .user-profile-box .detail ul li a i {
            margin-right: 10px;
        }
        .lni-files:before {
            content: "\e972";
        }
        a:hover {
            text-decoration: none;
            cursor: pointer;
        }
        .list-group-item.active {
            z-index: 2;
            color: #3490dc;
            background-color: #fafafa;
            border-color: transparent;
            box-shadow: 0 0 15px transparent;
        }

        .list-group-item {
            position: relative;
            display: block;
            padding: 0.75rem 1.25rem;
            margin-bottom: 0px;
            background-color: #fff;
            border-bottom: 0.5px solid rgba(0, 0, 0, 0.125) !important;
            border: none;
        }

        #page-wrap { 
          width: auto; 
          margin: 15px auto; 
          position: relative; 
        }

        #sidebar { 
          width: auto; 
          position: fixed; 
          margin-left: 410px; 
        }
    </style>
@endsection