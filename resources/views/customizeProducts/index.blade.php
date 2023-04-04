@section('style')
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>

@endsection

@section('scripts')
    <!-- JavaScript Bundle with Popper -->
    <script src="{{asset('js/jquery.js')}}"></script>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.center').slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                centerMode: true,
                variableWidth: true
            })
        });
    </script>
    <script src="{{asset('js/editor.js')}}"></script>
    <script type="text/javascript" src="{{ asset('slick.min.js') }}"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
@endsection
<x-app-layout>
    <div id="section-specification-product">
        <div class="row " id="row-custom">
            <div class="col-1 p-0 text-center kl-width">
                <!--start menu editor-->
                <nav class="navbar navbar-expand-lg navbar-light bg-dark vh-custom flex-column position-absolute"
                     id="nav-editor">
                    <div class="">
                        <div class="" id="navbarNav">
                            <ul class="navbar-nav flex-column w-100">
                                <li class="nav-item p-1">
                                </li>
                                <li class="nav-item p-1">
                                    <img src="text.png" onclick="editeurText()" alt="" width="44">
                                </li>
                                <li class="nav-item p-1">
                                    <img src="picture.png" onclick="editeurImage()" alt="" width="44">
                                </li>
                                <li class="nav-item p-1">
                                    <img src="cool.png" onclick="editeurEmoticon()" alt="" width="44">
                                </li>
                                <li class="nav-item p-1">
                                    <img src="photo.png" onclick="downloadImage()" alt="" width="44">
                                </li>
                                <li class="nav-item p-1 mt-auto">
                                    <img src="send-mail.png" onclick="" alt="" width="44">
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!--end menu editor-->
            </div>
            <div class="col-md-3 p-0 display-none " id="kl-text-content">
                <nav class="navbar navbar-dark text-light bg-dark vh-100 flex-column">
                    <!-- editeur de text start-->
                    <div class=" ">
                        <div style="width: 304px">
                            <div class="d-flex justify-content-between mt-4">
                                <h5 class="text-center ">Personnalisation du text</h5>
                                <i
                                    class="fa-solid fa-circle-xmark" onclick="editeurText()"
                                    style="cursor: default!important;"></i>
                            </div>
                            <hr class="hr">
                            <div class="text-style-options">
                                <label for="font-style"></label>
                                <select name="font-style" class="font-style form-control">
                                    <option value="Arial">Arial</option>
                                    <option value="Times New Roman">Times New Roman</option>
                                    <option value="Algerian">Algerian</option>
                                    <option value="Chiller">Chiller</option>
                                    <option value="Forte">Forte</option>
                                    <option value="Blackadder ITC">Blackadder ITC</option>
                                    <option value="Bauhaus 93">Bauhaus 93</option>
                                    <option value="Verdana">Verdana</option>
                                    <option value="Bradley Hand ITC">Bradley Hand ITC</option>
                                    <option value="Cooper Black">Cooper Black</option>
                                    <option value="Jokerman">Jokerman</option>
                                    <option value="Snap ITC">Snap ITC</option>
                                    <option value="Old English Text MT">Old English Text MT</option>
                                </select>
                                <label for="font-size"></label>
                                <select name="font-size" class="font-size form-control">
                                    <option value="12px">12px</option>
                                    <option value="14px">14px</option>
                                    <option value="16px">16px</option>
                                    <option value="18px">18px</option>
                                    <option value="20px">20px</option>
                                    <option value="22px">22px</option>
                                    <option value="24px">24px</option>
                                    <option value="26px">26px</option>
                                    <option value="28px">28px</option>
                                    <option value="36px">36px</option>
                                    <option value="48px">48px</option>
                                    <option value="72px">72px</option>
                                    <option value="100px">100px</option>
                                </select>
                                <label for="text-color"></label>
                                <input type="color" class="text-color form-control-color">
                                <label for="text-direction"></label>
                            </div>
                            <div class="text-preview">
                                <p id="preview-text" class="resizable modifText mt-4" contenteditable="true"></p>
                                <button class="btn btn-light" onclick="afficherText()">Ajouter</button>
                            </div>
                        </div>
                    </div>
                    <!-- editeur de text end-->
                </nav>
            </div>
            <div class="col-md-3 p-0 display-none " id="kl-emoji-content">
                <nav class="navbar navbar-dark text-light bg-dark vh-100 flex-column">
                    <!--emoji start-->
                    <div style="width: 304px">
                        <div class="d-flex justify-content-between mt-4">
                            <h5 class="text-center ">Inserer des reactions</h5>
                            <i
                                class="fa-solid fa-circle-xmark " onclick="editeurEmoticon()"
                                style="cursor: default!important;"></i>
                        </div>
                        <hr class="hr">
                        <div class="row">
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)"> &#128525;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)">&#128536;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)"> &#128539;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)">&#128540;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)">&#128512;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)">&#128514;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)">&#128077;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)">&#128078;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)">&#128076;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)">&#9994;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)">&#129307;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)">&#128406;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)">&#128075;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)">&#129310;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)">&#129312;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)">&#129311;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)">&#129304;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)">&#129309;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)">&#128591;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)">&#128170;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)">&#127881;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)">&#127774;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)">&#127829;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)">&#128054;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)">&#128049;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)">&#128640;</div>
                            <div class="col-4 tailleEmojie" onclick="emoji(this.innerHTML)">&#127752;</div>
                            <div class="col-4 tailleEmojie text-danger" onclick="emoji(this.innerHTML)">❤</div>
                        </div>
                    </div>
                    <!-- emoji end-->
                </nav>
            </div>
            <div class="col-md-3 p-0 display-none " id="kl-img-content">
                <nav class="navbar navbar-dark text-light bg-dark vh-100 flex-column">
                    <!--emoji start-->
                    <div style="width: 304px">
                        <div class="d-flex justify-content-between mt-4">
                            <h5 class="text-center ">Inserer une image</h5>
                            <i
                                class="fa-solid fa-circle-xmark " onclick="editeurImage()"
                                style="cursor: default!important;"></i>
                        </div>
                        <hr class="hr">
                        <input type="file" id="image-input" class="form-control">
                        <button onclick="emoji(document.getElementById('image'))" class="btn btn-light mt-4">Ajouter
                        </button>
                    </div>
                    <!-- emoji end-->
                </nav>
            </div>
            <div class="col-md-5 mt-5">
                <div id="myPng">
                    <div id="carouselExampleControls" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="335183137_140137785375258_1842154047233564047_n.jpg" class="d-block w-100"
                                     alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="draggable display-none">
                        <div class="drag-handle bg-dark text-light d-flex  justify-content-between flex-row-reverse">
                            <div class="text-center position-absolute " id="resizable-div"
                                 style="left: 335px;top: 281px; cursor: default;" ondblclick="resizeEmoji()">
                            </div>
                            <i
                                class="fa-solid fa-circle-xmark "
                                onclick="this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);"
                                style="cursor: default!important;"></i>
                        </div>
                        <div class="d-flex align-items-right justify-content-right rangeRotate"
                             style="border: white 1px solid;padding: 2px !important;">
                            <label for="" class="text-light" style="box-shadow: 2px 2px 5px #000;">Rotation</label>
                            <input type="range" value="0" min="0" max="360" class="rotate-handle w-50 mx-auto"
                                   style="z-index: 1212345">
                        </div>
                        <div class="resize-handle"></div>
                        <img id="image" class="image" ondblclick="resizeBorder(this)">
                        <div class="d-flex align-items-right justify-content-end rangeOpacity"
                             style="border: white 1px solid;padding: 2px !important;">
                            <label for="" class="text-light" style="box-shadow: 2px 2px 5px #000;">Opacité</label>
                            <input type="range" value="1" min="0" max="1" step="0.01"
                                   class="opacity-handle w-50 mx-auto"
                                   style="z-index: 1212345">
                        </div>
                    </div>

                    <div id="newElement"></div>
                </div>
            </div>
            <div class="col-md-3 mt-3">
                <div class="container mt-5">
                    <h3 class="mt-5">Nos boite a bijoux</h3>
                    <h5 class="mt-2">10.000 Ar</h5>
                    <p id="detail"></p>
                    <div class="rating" style="font-size: 15px!important;">
                        <span class="star"><i class="fas fa-star filled"></i></span>
                        <span class="star"><i class="fas fa-star filled"></i></span>
                        <span class="star"><i class="fas fa-star filled"></i></span>
                        <span class="star"><i class="fas fa-star"></i></span>
                        <span class="star"><i class="fas fa-star"></i></span>
                    </div>
                    <div class="container mt-5 ">
                        <div class="center">
                            <div><img src="335183137_140137785375258_1842154047233564047_n.jpg" alt="" width="200"
                                      class="img img-fluide" onclick="slider(this);"></div>
                            <div><img src="335138218_157160000525217_5631332350438105455_n.jpg" alt="" width="200"
                                      class="img img-fluide" onclick="slider(this);"></div>
                            <div><img src="334698646_154537757130872_5538416810101276117_n.jpg" alt="" width="200"
                                      class="img img-fluide" onclick="slider(this);"></div>
                            <div><img src="335168084_773595214489724_7554904769320067054_n.jpg" alt="" width="200"
                                      class="img img-fluide" onclick="slider(this);"></div>
                        </div>
                    </div>
                    <form action="" class="mt-5">
                        <div class="d-flex">
                            <label for=""> Nombre</label>
                            <input type="number" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for=""> Commentaire</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-dark ml-3 mt-4">Ajouter au panier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>


