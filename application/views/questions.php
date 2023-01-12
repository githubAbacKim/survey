<style>
    .scale-div {
        background: rgba(255, 255, 255, 0.33);
        border-radius: 18px;
    }
</style>


<div class="container-fluid p-3">
    <!-- header -->
    <div class="row d-flex flex-row">
        <div class="col-lg-3 col-xs-12 p-3 text-center align-self-center offset-lg-1">
            <a href="<?php echo site_url('page/') ?>" class="navbar-brand logo">AI 도시를부탁해!</a>
        </div>
        <!-- <div class="col-lg-8 col-xs-12 d-flex justify-content-end bd-highlight">
            <div class="col-lg-2 bd-highlight">
                <a class="btn btn-lg text-color" id="redo" role="button">다시하기</a>
            </div>
            <div class="col-lg-3 col-sm-12 text-center bd-highlight">
                <a class="btn btn-secondary btn-sm shadow ms-3 p-2 btn-bg" role="button">조회</a>
            </div>
        </div> -->
    </div>
    <!-- end header -->
    <template id="data-template">
        <div class="col-lg-8 col-sm-12 question-card">
            <h5 class="fw-bold mt-4 text-color">{{question}}</h5>
            <!-- question div -->
            <div class="col-lg-12 d-flex bd-highlight">
                <div class="col-lg-6 col-sm-12 question-stat-card p-4 " data-value="agree" data-qnum="1">
                    <div class="text-left text-color">
                        <picture>
                            <img class="img-fluid" src='<?php echo base_url();?>{{agree_img}}' alt="agree" id="answer">
                        </picture>
                        <p class="m-2 p-2">{{agree_desc}}</p>
                    </div>
                </div>
                <div class=" col-lg-6 col-sm-12 question-stat-card p-4" data-value="disagree" data-qnum="1">
                    <div class="text-left text-color">
                        <picture>
                            <img class="img-fluid" src='<?php echo base_url();?>{{disagree_img}}' alt="disagree" id="answer">
                        </picture>

                        <p class="p-2 m-2">{{disagree_desc}}</p>
                    </div>
                </div>
            </div>
        </div>
    </template>
    <div class="row p-5 gap-3 justify-content-evenly d-flex flex-row-reverse bd-highlight" id="questCont">
    </div>
</div>
    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-body">
                <div class="alert alert-secondary text-center" role="alert">
                    A simple danger alert—check it out!
                </div>
            </div>
            <div class="modal-footer justify-content-md-center gap-2">
                <button type="button" id="initiateRedo" class="redobtn">확인</button>
                <button type="button" class="cancelbtn" data-bs-dismiss="modal">닫다</button>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnclose">close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal -->
<script src="<?php echo base_url("resources/js/question.js")?>"></script>
