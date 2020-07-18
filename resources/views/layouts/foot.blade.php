<footer id="catatan">
    <div class="kaki-atas">
        <div class="container text-putih">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <h3 class="nexa-text text-center tt">Tentang Kami</h3>
                        <ul class="list-unstyled list-me text-center">
                            <li><a href="{{url('about')}}"
                                    data-toggle="tooltip" data-placement="top" title="About">About</a></li>
                            <li><a href="{{url('disclaimer')}}"
                                    data-toggle="tooltip" data-placement="top" title="Disclaimer">Disclaimer</a></li>
                            <li><a href="{{url('privacy-police')}}"
                                    data-toggle="tooltip" data-placement="top" title="Privacy Police">Privacy Police</a></li>
                            <li><a href="{{url('contact')}}"
                                    data-toggle="tooltip" data-placement="top" title="Contact">Contact</a></li>
                        </ul>
                </div>
                <div class="col-md-4 col-sm-6">
                    <h3 class="nexa-text text-center tt">Ikuti Kami</h3>
                    <center>
                        <a href="//facebook.com/" data-toggle="tooltip" data-placement="top"
                            class="btn btn-primary btn-social" title="Ngodinger Facebook" target="_blank">
                                <i class="fa fa-facebook-official fa-lg"></i></a>
                        <a href="//twitter.com/NgodingerDev" data-toggle="tooltip" data-placement="top"
                            class="btn btn-primary btn-social" title="Ngodinger Twitter" target="_blank">
                                <i class="fa fa-twitter-square fa-lg"></i></a>
                        <a href="//youtube.com/" data-toggle="tooltip" data-placement="top"
                            class="btn btn-primary btn-social" title="Ngodinger Youtube" target="_blank"> 
                                <i class="fa fa-youtube-play"></i></a>
                        <a href="//plus.google.com" data-toggle="tooltip" data-placement="top"
                            class="btn btn-primary btn-social" title="Ngodinger Plus" target="_blank">
                                <i class="fa fa-google-plus-square fa-lg"></i></a>
                        <a href="mailto:admin@ngodinger.tk" data-toggle="tooltip" data-placement="top"
                            class="btn btn-primary btn-social" title="E-Mail to : Ngodinger.tk">
                                <i class="fa fa-envelope"></i></a>
                    </center>
                </div>
                <div class="col-md-4 col-sm-6">
                    <h3 class="nexa-text text-center tt">Our Partner</h3>
                    <form>
                    <div class="input-group">
                        <input type="text" class="form-control form-email" placeholder="emailkamu@email.com">
                        <span class="input-group-btn">
                            <button class="btn btn-info" type="button">Langganan</button>
                        </span>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar kaki-bawah">
        <div class="container">
            <div class="nav text-putih text-center">
            Copyright &copy; {{date('Y')}} - <a href="">Ngodinger</a>. All Right Reserved.<br>
            Developed By : <a href="//facebook.com/diinggo" target="blank">Diinggo Sirojudin</a>
            <a href="#" class="btn btn-primary pull-right to-atas"><i class="fa fa-arrow-up fa-lg"></i></a>
            <!-- <div class="pull-right">
                <ul class="list-unstyled">
                    <li><a href="">Company</a></li>
                    <li><a href="">Team</a></li>
                    <li><a href="">Site Map</a></li>
                    <li><a href="">Advertising</a></li>
                </ul>
            </div> -->
            </div>
        </div>
    </div>
</footer>
<div id="search" class="navbar-fixed-top">
    <button type="button" class="close">×</button>
    <form method="get" action="{{url('cari')}}" autocomplete="false">
        <input type="search" name="nama" placeholder="Search" autocomplete="false" autofocus="true" />
        <button type="submit" class="btn btn-primary">Cari !</button>
    </form>
</div>

