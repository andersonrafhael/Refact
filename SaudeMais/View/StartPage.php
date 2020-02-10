<?php

include "HeaderMenu.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Montserrat+Alternates&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/8fff6865c6.js" crossorigin="anonymous"></script>
  <title>Home Page</title>

  <!-- Main Stylesheet File -->
  <link href="../../css/style.css" rel="stylesheet">

</head>

<body>


  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active">
            <div class="carousel-background"><img src="../../img/intro-carousel/1.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Profissionalismo</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <a href="" class="btn-get-started scrollto">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="../../img/intro-carousel/2.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Comprometimento</h2>
                <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut.</p>
                <a href="" class="btn-get-started scrollto">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="../../img/intro-carousel/3.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Cuidado</h2>
                <p>Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt omnis iste natus error sit voluptatem accusantium.</p>
                <a href="" class="btn-get-started scrollto">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="../../img/intro-carousel/4.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Prevenção</h2>
                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum.</p>
                <a href="" class="btn-get-started scrollto">Get Started</a>
              </div>
            </div>
          </div>
        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>Sobre Nós</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </header>

        <div class="row about-cols">

          <div class="col-md-4 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="../../img/about-mission.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Nossa Missão</a></h2>
              <p>
                Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
                <img src="../../img/about-plan.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-list-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Nosso Plano</a></h2>
              <p>
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem  doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">
              <div class="img">
                <img src="../../img/about-vision.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-eye-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Nossa Visão</a></h2>
              <p>
                Nemo enim ipsam voluptatem quia voluptas sit aut odit aut fugit, sed quia magni dolores eos qui ratione voluptatem sequi nesciunt Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #about -->


 <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container">

        <div class="row">

        <div class="row">
        <div class="col-lg-4 col-md-6 box wow bounceInUp">
          <h3 class="icon-info">Nossos Serviços</h3>
          <hr class="botm-line">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris cillum.</p>
        </div>
        <div class="col-lg-4 col-md-6 box wow bounceInUp">
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-stethoscope"></i>
            </div>
            <div class="icon-info">
            <h4 class="title">Suporte 24h</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-ambulance"></i>
            </div>
            <div class="icon-info">
              <h4>Serviços de Emergência</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 box wow bounceInUp">
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-user-md"></i>
            </div>
            <div class="icon-info">
              <h4>Aconselhamento Médico</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-medkit"></i>
            </div>
            <div class="icon-info">
              <h4>Serviços de Saúde</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
        </div>
      </div>

      </div>
    </section><!-- #services -->



 <!--==========================
      Saúde Preventiva Section
    ============================-->
    <section id="about">
        <div class="container">

            <header class="section-header" id="prev">
                <h3>Saúde Preventiva</h3>
                <p>
                    Saúde preventiva é o nome dado ao ato de remediar problemas, como doenças, e não necessariamente tratá-los. O seu principal objetivo é evitar que esse tipo de ocorrência surja para que, assim, o paciente tenha mais qualidade de vida e longevidade sem precisar de intervenções terapêuticas.
                </p>
            </header>

          <div class="row about-cols">

            <div class="col-md-4 wow fadeInUp">
              <div class="about-col prev1" id="prev1">
                <div class="img">
                  <img src="../../Images/prev4.jpg" alt="" class="img-fluid">
                </div>
                <h2 class="title"><a href="https://www.unimed.coop.br/web/maceio/viver-bem/pais-e-filhos/meu-filho-nao-quer-comer-e-agora-">Meu filho não quer comer. E agora?</a></h2>
                <p>
                    Vários motivos podem levar a criança a recusar determinados alimentos ou ainda resistir a completar as refeições. Saiba como lidar com essa recusa alimentar
                </p>
              </div>
            </div>

            <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
              <div class="about-col" id="prev2">
                <div class="img">
                  <img src="../../Images/prev5.jpg" alt="" class="img-fluid">
                </div>
                <h2 class="title"><a href="https://www.unimed.coop.br/web/maceio/viver-bem/saude-em-pauta/atividade-fisica-na-natureza">Atividade física na natureza</a></h2>
                <p>
                    O contato com a natureza traz benefícios e pode servir como um estímulo a mais para você praticar mais atividade física; saiba por onde começar
                </p>
              </div>
            </div>

            <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
              <div class="about-col" id="prev3">
                <div class="img">
                  <img src="../../Images/prev3.jpg" alt="" class="img-fluid">
                </div>
                <h2 class="title"><a href="https://www.unimed.coop.br/web/maceio/viver-bem/pais-e-filhos/o-que-posso-ou-nao-fazer-durante-a-gravidez-">O que posso fazer ou não durante a gravidez?</a></h2>
                <p>
                    Exercitar-se e manter hábitos saudáveis é essencial para uma gravidez tranquila. Mas quais as atividades as mamães podem realizar? Quais as dicas para uma boa dieta e o que deverão evitar durante a gestação?
                </p>
              </div>
            </div>

          </div>

        </div>
      </section><!-- #about -->

       <!-- Notícias -->
       <header class="section-header" id="news">
          <h3>Notícias</h3>
      </header>

      <section class="news1">
        <article class="noticias bloco1"><h1>O poder da tecnologia aplicada à saúde</h1>
            <a class="btn" href="https://fia.com.br/blog/tecnologia-aplicada-a-saude/">Saiba Mais <i class="fas fa-plus"></i></a>
        </article>
        <article class="noticias bloco2"><h1>Seja criativo com as crianças curiosas</h1>
            <a class="btn" href="">Saiba Mais <i class="fas fa-plus"></i></a>
        </article>
        <article class="noticias bloco3"><h1>Câncer Cerebral: Lítio pode restaurar funções cognitivas após radiação</h1>
            <a class="btn" href="https://www.medicalnewstoday.com/articles/327081.php#1">Saiba Mais <i class="fas fa-plus"></i></a>
        </article>
        <article class="noticias bloco4"><h1>A tecnologia a serviço do bem-estar dos animais de estimação</h1>
            <a class="btn" href="https://www.consumidormoderno.com.br/2019/11/25/tecnologia-bem-estar-animais-de-estimacao/">Saiba Mais <i class="fas fa-plus"></i></a>
        </article>
        <article class="noticias bloco5"><h1>Programa que vai integrar dados de usuários do SUS em todo o país é lançado em Alagoas</h1>
            <a class="btn" href="https://g1.globo.com/al/alagoas/noticia/2019/11/11/programa-que-vai-integrar-dados-de-usuarios-do-sus-em-todo-o-pais-e-lancado-em-alagoas.ghtml">Saiba Mais <i class="fas fa-plus"></i></a>
        </article>
    </section>


    <!-- Vantagens Saúde+ -->
    <section class="caracteristicas">

        <h3> Vantagens de ser usuário Saúde+ </h3>
        <p> "Você usa, a gente cuida"</p>
        <ul class="grid">
            <li>
                <i class="fas fa-user-md"></i>
                <h4> Especialidades </h4>
                <p> Saiba quais especialidades estão sendo ofertadas e quais os horário de funcionamento de
                    cada posto e hospital cadastrado no nosso catálogo.
                </p>
            </li>
            <li>
                <i class="fas fa-prescription-bottle-alt"></i>
                <h4> Medicamentos </h4>
                <p> Confira a disponibilidade e a previsão de chegada de medicamentos nos postos de
                    distribuição da sua cidade
                </p>
            </li>
            <li>
                <i class="fas fa-heartbeat"></i>
                <h4> Dicas de Saúde </h4>
                <p> Receba dicas de saúde e informações personalizadas de acordo com seu histórico pessoal e estilo de vida
                </p>
            </li>
            <li>
                <i class="fas fa-baby-carriage"></i>
                <h4> Gestação </h4>
                <p> Descobriu que vai ser mãe? Tenha acesso a um guia completo para acompanhar a sua gestação e o
                    desenvolvimento do seu bebê
                </p>
            </li>

        </ul>

    </section>
  </main>
  

 <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>SaudeMais</strong>. Todos os Direitos Reservados
      </div>
    </div>
  </footer><!-- #footer -->

</body>
</html>
