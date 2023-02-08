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
    .section2{
        background-image: url('../../resources/images/aboutus/Group\ 1110.svg');
        background-position:center;
        background-size:contain;
        background-repeat: no-repeat;
    }
    .footertext{
        font-size: 1rem;
    }
</style>

<main>
    <div class="container-fluid section1"> 
        <img src="../../resources/images/aboutus/section1.svg" class="img-fluid" alt="...">
    </div>
    <div class="container-fluid section2">
        <div class="row mt-5 gap-2">
            <div class="col-2 offset-3">
            <img class="img-fluid" src="../../resources/images/aboutus/tab1.svg" alt="">
            </div>
            <div class="col-2">
            <img class="img-fluid" src="../../resources/images/aboutus/tab2.svg" alt="">
            </div>
            <div class="col-2">
            <img class="img-fluid" src="../../resources/images/aboutus/tab3.svg" alt="">
            </div>
        </div>
        <div class="row mt-15">
            <div class="col-sm-12 col-md-8 offset-md-2">
                <img class="img-fluid" src="../../resources/images/aboutus/tab4.svg" alt="">
            </div>
        </div>
    </div>
    <div class="container-fluid mb-5">
        <div class="col-6 offset-3 mt-5">
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
