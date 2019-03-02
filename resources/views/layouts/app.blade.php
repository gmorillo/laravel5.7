<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('js/jquery.imageuploader.js') }}"></script>
    <script src="{{ asset('js/lozad.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    
    
    
    @yield('script')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.imageuploader.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon">
    
    @yield('stylesheet')
</head>
<body>
    <div id="app">
        <div class="d-flex justify-content-center " >
            <a href="#">
                <img src="/public/img/facebook.jpg" class="img-fluid d-block   m-0" alt="" style="width: auto; height: 30px;">
            </a>
            <a href="#">
                <img src="/public/img/twitter.jpg" class="img-fluid d-block  m-0" alt="" style="width: auto; height: 30px;">
            </a>
            <a href="#">
                <img src="/public/img/instagram.jpg" class="img-fluid d-block   m-0" alt="" style="width: auto; height: 30px;">
            </a>
        </div>
        <nav class="navbar navbar-expand-md navbar-dark navbar-laravel sticky-top " style="background-color:rgba(52,58,64,0.8)">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/public/img/watermark.png" class="img-fluid d-block   m-0" alt="" style="width: auto; height: 73px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item ">
                                <a class="nav-link btn btn-danger text-white" data-toggle="modal" data-target="#exampleModal" style="cursor: pointer">{{ __('Contacto') }}</a>
                            </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Crear cuenta') }}</a>
                                @endif
                            </li>
                        @else
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="/public/img/profiles/{{ Auth::user()->profile_img}}" alt="" class="fluid-img float-left mr-1" style="height: 24px; width: 24px; border-radius: 50%; object-fit: contain;"> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <div>
                                        <a class="dropdown-item" href="{{ url('profile') }}">Mi Cuenta</a>
                                    </div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar Sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main >
            @yield('content')
        </main>

        <footer>
            <div class="container mt-5" style="border-top: 1px solid rgba(0,0,0,0.1);">
                <div class="my-4">
                    <p class="text-center" ><?php echo date("Y"); ?> © www.bembosex.com | All rights reserved</p>
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a data-toggle="modal" data-target="#policy" class="social-icon text-xs-center text-danger" target="_blank" href="#">Política de privacidad</a>
                        </li>
                        <li class="list-inline-item">
                            <a data-toggle="modal" data-target="#terms" class="social-icon text-xs-center text-danger" target="_blank" href="#">Terminos y condiciones</a>
                        </li>
                    </ul>   
                    <p class="text-center"><a href="#top" class="text-dark">Back to top</a></p>
                </div>
            </div>
        </footer>   
    </div>
</body>
</html>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contáctanos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Información de contacto
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>





<div class="modal" tabindex="-1" role="dialog" id="policy">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Políticas de privacidad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Quiénes somos</h3>
                <p>bembosex.com es operado por SH Internacional. Esta política de privacidad describe cómo manejamos su información personal. Mediante el uso de bembosex.com (el “Sitio”) usted autoriza el almacenamiento, procesamiento, y uso de su información personal como se describe en esta política de privacidad. Esta política es efectiva a partir del 15 de julio de 2018.</p>

                <h3>Qué datos personales recogemos y por qué los recogemos</h3>
                <h3>Comentarios</h3>
                <p>Cuando los visitantes se registran, dejan comentarios en la web, recopilamos los datos que se muestran en el formulario de registro: nombre, apellido, email y número de teléfono celular, así como la dirección IP del visitante y la cadena de agentes de usuario del navegador para ayudar a la detección de spam.</p>

                <p>Una cadena anónima creada a partir de tu dirección de correo electrónico (también llamada hash) puede ser proporcionada al servicio de Gravatar para ver si la estás usando. La política de privacidad del servicio Gravatar está disponible aquí: https://automattic.com/privacy/. Después de la aprobación de tu comentario, la imagen de tu perfil es visible para el público en el contexto de su comentario.</p>

                <h3>Formularios de Registro</h3>
                <p>Al convertirse en usuario registrado, obtiene acceso a calificar, votar y comentar en los anuncios de El Sitio y solo se pedirán datos básicos. Estos datos solo y únicamente serán usado para lo antes mencionado y para el envío, previa autorización, de mensajes sobre nuevos anuncios, ofertas o información relevante.</p>

                <p>Los Usuarios, mediante la marcación de las casillas correspondientes y entrada de datos en los campos, marcados con un asterisco (*) en el formulario de egistro o presentados en formulario para publicarse, aceptan expresamente y de forma libre e inequívoca, que sus datos son necesarios para atender su petición, por parte del Sitio, siendo voluntaria la inclusión de datos en los campos restantes. El Usuario garantiza que los datos personales facilitados a el SITIO son Veraces y se hace responsable de comunicar cualquier modificación de los mismos.</p>

                <h3>Cookies</h3>
                <p>Si tienes una cuenta de usuario registrado y te conectas a este sitio, instalaremos una cookie temporal para determinar si tu navegador acepta cookies. Esta cookie no contiene datos personales y se elimina al cerrar el navegador.</p>

                <p>Cuando inicias sesión, también instalaremos varias cookies para guardar tu información de inicio de sesión y tus opciones de visualización de pantalla. Las cookies de inicio de sesión duran dos días, y las cookies de opciones de pantalla duran un año. Si seleccionas “Recordarme”, tu inicio de sesión perdurará durante cuatro (4) semanas. Si sales de tu cuenta, las cookies de inicio de sesión se eliminarán.</p>

                <h3>Contenido incrustado de otros sitios web</h3>
                <p>Los artículos de este sitio pueden incluir contenido incrustado (por ejemplo, vídeos, imágenes, artículos, etc.). El contenido incrustado de otras web se comporta exactamente de la misma manera que si el visitante hubiera visitado la otra web.</p>
                <p>Estas web pueden recopilar datos sobre ti, utilizar cookies, incrustar un seguimiento adicional de terceros, y supervisar tu interacción con ese contenido incrustado, incluido el seguimiento de su interacción con el contenido incrustado si tienes una cuenta y estás conectado a esa web.</p>

                <h3>Analítica</h3>
                <p>Con propósitos de mantenimiento periódico, y en aras de garantizar el mejor servicio posible al usuario, este sitio web hace uso de cookies “analíticas” para el recabado de Estadísticas de Actividad. Además de ofuscar la dirección IP del visitante de modo previo a su registro, su duración es inferior a 12 meses y la información recabada será en todo caso anónima, no siendo posible establecer vínculo alguno entre patrones de navegación y personas físicas. El usuario podrá excluir su actividad individual mediante los sistemas de exclusión (“opt-out”) facilitados por Google Analytics , Adobe Analytics y Web Trekk .</p>

                <h3>Con quién compartimos tus datos</h3>
                <p>El SITIO informa y garantiza expresamente a los usuarios que sus datos personales no serán cedidos en ningún caso a terceros, y que siempre que realizara algún tipo de cesión de datos personales, se pedirá previamente el consentimiento expreso, informado e inequívoco por parte los Usuarios. Todos los datos solicitados a través del sitio web son obligatorios, ya que son necesarios para la prestación de un servicio óptimo al Usuario. En caso de que no sean facilitados todos los datos, no se garantiza que la información y servicios facilitados sean completamente ajustados a sus necesidades.</p>

                <h3>Cuánto tiempo conservamos tus datos</h3>
                <p>Si dejas un comentario, el comentario y sus metadatos se conservan indefinidamente. Esto es para que podamos reconocer y aprobar comentarios sucesivos automáticamente en lugar de mantenerlos en una cola de moderación.</p>

                <p>De los usuarios que se registran en nuestra web (si los hay), también almacenamos la información personal que proporcionan en su perfil de usuario. Todos los usuarios pueden ver, editar o eliminar su información personal en cualquier momento (excepto que no pueden cambiar su nombre de usuario). Los administradores de la web también pueden ver y editar esa información.</p>

                <h3>Qué derechos tienes sobre tus datos</h3>
                <p>Si tienes una cuenta o has dejado comentarios en esta web, puedes solicitar recibir un archivo de exportación de los datos personales que tenemos sobre ti, incluyendo cualquier dato que nos hayas proporcionado. También puedes solicitar que eliminemos cualquier dato personal que tengamos sobre ti. Esto no incluye ningún dato que estemos obligados a conservar con fines administrativos, legales o de seguridad.</p>

                <h3>Dónde enviamos tus datos</h3>
                <p>Los comentarios de los visitantes puede que los revise un servicio de detección automática de spam.</p>

                <h3>Información adicional</h3>
                <h3>Cómo protegemos tus datos</h3>
                <p>El SITIO cuenta con las máximas medidas de seguridad comercialmente disponibles en el sector. Además, el proceso de pago funciona sobre un servidor seguro utilizando el protocolo SSL (Secure Socket Layer).</p>
                <p>El servidor seguro establece una conexión de modo que la información se transmite cifrada mediante algoritmos de 128 bits, que aseguran que sólo sea inteligible para el ordenador del Cliente y el del Sitio Web. De esta forma, al utilizar el protocolo SSL se garantiza:</p>

                <ul>
                    <li>Que el Cliente está comunicando sus datos al centro servidor de e SITIO y no a cualquier otro que intentará hacerse pasar por éste.</li>
                    <li>Que entre el Cliente y el centro servidor de el SITIO, los datos se transmiten cifrados, evitando su posible lectura o manipulación por terceros.</li>
                </ul>

                <h3>Modificación de los Términos y Condiciones</h3>
                <p>La EMPRESA se reserva el derecho de modificar, en cualquier momento, la presentación y configuración del Sitio Web, así como las presentes Condiciones. Por ello, la EMPRESA recomienda leerlas atentamente cada vez que acceda al Sitio Web. Clientes y Usuarios siempre dispondrán de estos Términos y Condiciones de uso en un sitio visible, libremente accesible para cuantas consultas quiera realizar. En cualquier caso, la aceptación de los Términos y Condiciones de uso será un paso previo e indispensable a la adquisición de cualquier producto disponible a través del Sitio Web.</p>

                <h3>Aceptación y Consentimiento</h3>
                <p>El Usuario declara haber sido informado de las condiciones sobre protección de datos de carácter personal, aceptando y consintiendo el tratamiento de los mismos por parte de SexyHotPanama, en la forma y para las finalidades indicadas en la presente Política de Protección de Datos Personales.</p>

                <p>Por lo tanto, al utilizar los formularios incluidos en este sitio web propiedad de SH Internacional, usted está autorizando expresamente a la utilización de sus datos para el envío de comunicaciones comerciales, por cualquier vía (incluido correo electrónico), pudiendo anular dicha autorización, cuando lo desee, dirigiéndome a SexyHotPanama.</p>

                <h3>Criterios de conservación de los datos:</h3>
                <p>Se conservarán mientras exista un interés mutuo para mantener el fin del tratamiento y cuando ya no sea necesario para tal fin, se suprimirán con medidas de seguridad adecuadas para garantizar la seudonimización de los datos o la destrucción total de los mismos.</p>
                <h3>Comunicación de los datos:</h3>
                <p>No se comunicarán los datos a terceros, salvo obligación legal.</p>

                <h3>Medidas de Seguridad</h3>
                <p>Que de conformidad con lo dispuesto en las normativas vigentes en protección de datos personales, el SITIO está cumpliendo con todas las disposiciones de las normativas GDPR para el tratamiento de los datos personales de su responsabilidad, y manifiestamente con los principios descritos en el artículo 5 del GDPR, por los cuales son tratados de manera lícita, leal y transparente en relación con el interesado y adecuados, pertinentes y limitados a lo necesario en relación con los fines para los que son tratados.</p>

                <p>El SITIO garantiza que ha implementado políticas técnicas y organizativas apropiadas para aplicar las medidas de seguridad que establecen el GDPR con el fin de proteger los derechos y libertades de los Usuarios y les ha comunicado la información adecuada para que puedan ejercerlos.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="terms">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Terminos y condiciones</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
                <p>Antes de ingresar a la página de bembosex.com, usted debe leer atentamente los siguientes Términos y Condiciones.</p>

                <p>Al ingresar usted está aceptando los Términos y Condiciones aquí establecidos. Si no está de acuerdo, no debe ingresar ni utilizar dicha página para publicar productos, realizar transacciones y/o navegar en ella.</p>

                <h3>1.- PROHIBICIÓN ACCESO DE MENORES.-</h3>
                <p>En la página de bembosex.com se ofrecen productos, material y servicios cuyo contenido (texto y fotografía) es exclusivamente para adultos, por tanto, sólo deben ingresar personas mayores de 18 años.</p>

                <p>El ingreso de menores de edad a esta página, es de exclusiva responsabilidad de los padres, representantes o responsables. Es deber de los padres orientar la conducta de sus hijos menores de edad controlando o evitando el acceso a estas páginas mediante programas de protección como Surf Watch, Net Nannyo Cyber Patrol, a los cuales estamos registrados, así como educándolos adecuadamente a que respeten la naturaleza de estas páginas.</p>

                <h3>2.- BIENES Y SERVICIOS PROHIBIDOS.-</h3>
                <p>La página de bembosex.com se acoge a la prohibición de la oferta y demanda de artículos, bienes y/o servicios que: Impliquen pornografía infantil, prostitución infantil, explotación sexual infantil o incluyan la mención en singular o plural de “niña”, “niño” y/o “adolescente”; y/o que presenten apología a la violencia o al delito; y/o que inciten a la discriminación, al odio o racismo.</p>

                <h3>3.- LIMITACIÓN DE RESPONSABILIDAD POR CONTENIDO.-</h3>
                <p>La página de bembosex.com es exclusivamente una Guía Publicitaria, por ello, la responsabilidad de la página de bembosex.com se limita a informar.</p>

                <p>Todo contenido de los avisos (texto y fotografía) que se publican en la página de bembosex.com son de la única y exclusiva responsabilidad del anunciante y de ninguna manera la empresa conoce, participa o interfiere en las actividades que realiza el anunciante.</p>

                <p>La empresa no se hace responsable por la exactitud, veracidad, fidelidad o legalidad del contenido de los avisos.</p>

                <p>Es responsabilidad de la parte interesada hacer las averiguaciones correspondientes sobre el origen, características, condición, funcionamiento y demás propiedades inherentes a los bienes y/o servicios ofrecidos por los anunciantes.</p>

                <p>La página de bembosex.com no guarda ningún tipo de relación laboral con las personas naturales o jurídicas que aquí se publicitan. Es de la exclusiva responsabilidad del anunciante de servicios el personal que tenga empleado. En consecuencia, estarán a cargo de este todos los pagos a que hubiere lugar, de conformidad con la legislación laboral que resultare aplicable según el caso, sin que tuviere los creadores, los diseñadores y/o los propietarios de la página de bembosex.com, ningún tipo de responsabilidad u obligación frente a dicho personal.</p>

                <p>Con el acceso a la página, el usuario declara estar conforme con lo mencionado y exonera a la página de bembosex.com de cualquier responsabilidad legal que pudiera derivarse de las transacciones originadas en este sitio Web.</p>

                <p>En virtud de lo antes expresado, declaro que:</p>

                <p>Tengo más de 18 años y tengo capacidad legal para adquirir y/o contratar los bienes y/o servicios ofrecidos en esta página.</p>
                <p>No permitiré acceder a ninguna persona menor de 18 años a la página de bembosex.com ni a los productos que en ella estén publicados.</p>
                <p>El usuario de la página de bembosex.com, entiende y acepta la responsabilidad por sus propias acciones y conductas, así como las de sus hijos menores transgresores por su no diligencia y cuido.
                    Ingreso a la página de bembosex.com por mi decisión voluntaria y personal, porque quiero ver, ofertar, comprar o vender los productos y/o bienes y servicios que en ella se publican y con mi declaración de voluntad, no considero ofensivas o lesivas las imágenes o mensajes de connotación erótica, sexual o pornográfica que pudiera encontrar en la página de bembosex.com.</p>
                <p>Soy exclusivamente responsable por la legalidad de los productos, bienes y/o servicios que adquiero, y libero a la página de bembosex.com de toda responsabilidad relacionada con la exactitud, veracidad, fidelidad o legalidad del contenido de los avisos.</p>
                <p>Entiendo y acepto que la página de bembosex.com se limita a prestar un servicio de publicidad.
                    No considero ofensivas o lesivas las imágenes o mensajes que pudiera encontrar en la página de bembosex.com.</p>
                <p>La empresa se reserva el derecho de permitir o no la publicación para ofertar o demandar bienes y/o servicios en esta página web.</p>
                <p>El diseño general de estas páginas son propiedad exclusiva y absoluta de los creadores de la página de bembosex.com y en ningún momento y bajo ningún concepto podrán ser utilizadas sin previa autorización por escrito sus creadores.</p>
                <p>Los creadores y los propietarios de la página de bembosex.com, así como nuestro proveedor de servicio, aportan las normas aquí señaladas, liberándose así como consecuencia de acción u omisión de los usuarios, de toda obligación y/o responsabilidad legal.</p>
                <p>Usted está aceptando completamente estos términos, siendo la única prueba necesaria para ello su acceso</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>