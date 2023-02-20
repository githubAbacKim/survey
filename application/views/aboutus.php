<style>
    .scale-div {
        background: rgba(255, 255, 255, 0.33);
        border-radius: 18px;
    }
    .btnWhite{
        background-color: white;
        border: none;
        color: #F57600;
        transition: 0.4s;
        width: 130px;
        border-radius: 12px;
    }
    /* div{
        border:solid 1px;
        padding: 0 !important;
    } */
    .quarterheight{
        height: 70vh;
        height: 70dvh;
    }
    .fullheight{
        height: 100vh;
        height: 100dvh;
    }
    .aboutsect1{
        width: 80% !important;
        margin-left: 25%;
    }
    .mt-10{
        margin-top: 8em;
    }
    .mt-15{
        margin-top: 15em;
    }
    /* .section1{
        background-image: url('../../resources/images/aboutus/section1bg.svg');
        background-position:bottom;
        background-size:contain;
        background-repeat: no-repeat;
        height: 100vh;
    } */
    .section2{
        background-image: url('../../resources/images/aboutus/section2.svg');
        background-position:bottom;
        background-size:contain;
        background-repeat: no-repeat;
    }
    .footertext{
        font-size: 1rem;
    }
    .text-orange{
        color: #CB6100;
    }
    .text-brown{
        color: #5C1C2C;
    }
</style>

<main>
    <div class="container-fluid section1"> 
        <div class="col-lg-6 col-sm-7 offset-lg-3 offset-sm-3">
            <img src="../../resources/images/aboutus/section1.svg" class="img-fluid" alt="...">
        </div>
    </div>
    <div class="container-fluid section2 p-5">
        <div class="row mt-5 gap-1 justify-content-center">
            <div class="col-lg-3 col-md-4 col-sm-4">
            <img class="img-fluid" src="../../resources/images/aboutus/tab1.svg" alt="">
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4">
            <img class="img-fluid" src="../../resources/images/aboutus/tab2.svg" alt="">
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4">
            <img class="img-fluid" src="../../resources/images/aboutus/tab3.svg" alt="">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xs-12 col-md-8 offset-md-2">
                <!-- <img class="img-fluid" src="../../resources/images/aboutus/tab4.svg" alt=""> -->
                <p class="text-break bold text-brown">
                    <span class="text-orange">AI도시를 부탁해</span>는 <span class="text-success">사람이 중심이 되는 ‘인공지능(AI) 윤리 기준’의 3대 기본원칙</span>에서 아이디어를 얻어 제작하였습니다. 다만, <span class="text-orange">AI도시를 부탁해</span>에서는 인간 존엄성, 사회 공공선, 기술 합목적성의 정의를 인간, 사회, 기술에 초점을 맞춰 단순화 하였습니다. 따라서 <span class="text-orange">사람이 중심이 되는 ‘인공지능(AI) 윤리 기준’</span>과 <span class="text-orange">AI도시를 부탁해</span>에서의 인간 존엄성, 사회 공공선, 기술 합목적성의 정의는 다를 수 있습니다.
                </p>
            </div>
        </div>
    </div>
    <div class="container-fluid mb-5">
        <div class="col-lg-6 offset-lg-3 col-xs-12 mt-5">
            <img class="img-fluid" src="../../resources/images/aboutus/Group 1111.svg" alt="">            
        </div>
    </div>
    <div class="container-fluid mt-5 mb-5">
        <div class="row">
            <div class="col-6 text-center text-color bg-light p-3 footertext">egkim618@gmail.com</div>
            <div class="col-6 text-center text-color bg-light p-3 footertext">AI도시를 부탁해 by 김은경</div>
        </div>
    </div>
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-body">
                <div class="alert alert-secondary text-center" role="alert">
                    A simple danger alert—check it out!
                </div>
            </div>
            <div class="modal-footer justify-content-md-center gap-2">
                <button type="button" id="initiateRedo" class="redobtn">나가기</button>
                <button type="button" class="cancelbtn" data-bs-dismiss="modal">취소</button>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alertModalLabel">Error!!!</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" id="btnclose">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="alert alert-success" style="display:none" role="alert">A simple success alert—check it out!</div>
                <div class="alert alert-danger" style="display:none" role="alert">A simple danger alert—check it out!</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnclose">취소</button>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- <script src="<?php echo base_url("resources/js/question.js")?>"></script> -->
