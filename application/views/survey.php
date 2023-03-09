<style>
    .scale-div {
        border-top-left-radius: 1em;
        border-top-right-radius: 1em;
        overflow: auto;
    }

    .card-body {
        border-bottom-left-radius: 2em;
        border-bottom-right-radius: 2em;
    }

    /* Style the form */
    /* #regForm {
    background-color: #ffffff;
    margin: 100px auto;
    padding: 40px;
    width: 70%;
    min-width: 300px;
    } */

    /* Style the input fields */
    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 15px;
        background-color: #bbbbbb;
        border: solid 4px #5C1C2C;
        /* border: none; */
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    /* Mark the active step: */
    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #FFCC4A;
    }
    #submitBtn{
        display: none;
    }
    button{
        border:none;
        background: none;
    }
    /* input[type=radio]{
        opacity: 0;
    } */
    .questiontext{
        background-image : url("../../resources/images/questionbg.svg");
    }
</style>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-lg-2 col-xs-12 offset-2 p-5 text-color">
            <a href="<?php echo site_url('page/') ?>" class="navbar-brand logo">AI 도시를 부탁해!</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xs-5 header-text-container">
            <div class="col-lg-6 offset-lg-2">
            <p class="header-text p-3 text-color">문제의 상황 설명과 선택지의 근거를 바탕으로 선택해주세요. 총 9 문항입니다.</p>
            </div>
        </div>
    </div>

    <template id="steps-template">
        <span class="step"></span>
    </template>

    <div class="row">
        <div class="col-lg-4 offset-lg-2 col-xs-12">
            <div class="mt-3 progress-indicator">
            </div>
        </div>
        <div class="col-lg-2 offset-lg-2 next-page-indicator text-center mt-3">
            <button type="button" id="prevBtn"><img src="<?php echo base_url('resources/images/back.svg');?>"  alt="">&nbsp; 이전</button>
            <button type="button" id="nextBtn">다음 &nbsp;<img src="<?php echo base_url('resources/images/next.svg');?>"  alt=""></button>
            <button type="button" id="submitBtn">제출하다 &nbsp;<img src="<?php echo base_url('resources/images/next.svg');?>"  alt=""></button>
        </div>
    </div>
    <template id="datatemplate">
        <div class="tab col-lg-12">
            <div class="col-lg-8 p-3 offset-lg-2 col-xs-12 questiontext text-color">
                <p>{{question}}</p>
            </div>
            <div class="col-lg-12 col-xs-12 p-3 gap-3 justify-content-md-center d-flex flex-row bd-highlight">
                <div class="scale-div col-lg-3 col-xs-6" data-value="agree" data-qnum='{{qnum}}'>
                    <label for="ag{{qnum}}">
                        <picture>
                            <source srcset='<?php echo base_url()?>{{agree_img}}' type="image/svg+xml">
                            <img class="img-fluid" src='<?php echo base_url()?>{{agree_img}}' alt="agree" id="answer" />
                        </picture>
                        <div class="card-title-t text-center p-2 text-color">
                            <h5>{{agree_title}}</h5>
                        </div>
                        <div class="card-body card-height text-color p-3">
                            <p class="fs-5">{{agree_desc}}</p>
                        </div>
                        <input type="radio" name="rq{{qnum}}" value="agree" id="ag{{qnum}}" class="radio" >
                    </label>
                </div>
                <div class="scale-div col-lg-3 col-xs-6" data-value="disagree" data-qnum='{{qnum}}'>
                    <label for="dis{{qnum}}">
                        <picture>
                            <source srcset='<?php echo base_url()?>{{disagree_img}}' type="image/svg+xml">
                            <img class="img-fluid" src='<?php echo base_url()?>{{disagree_img}}' alt="disagree" id="answer" />
                        </picture>
                        <div class="card-title-t text-center p-2 text-color">
                            <h5>{{disagree_title}}</h5>
                        </div>
                        <div class="card-body card-height text-color p-3">
                            <p class="fs-5">{{disagree_desc}}</p>
                        </div>
                        <input type="radio" name="rq{{qnum}}" value="disagree" id="dis{{qnum}}" class="radio">
                    </label>
                </div>                
            </div>
            <div class="col-lg-6 offset-lg-3 col-xs-12 text-color">
                <input class="form-control" name="comment{{qnum}}" type="text" placeholder="위 문항에 대한 시장님의 의견을 들려주세요!" aria-label="default input example">
            </div>
        </div>
    </template>
    <div class="row mt-5">
        <form action="<?php echo site_url('page/survey_answers');?>" method="POST" id="regForm">
            <div id="slideCont">
            </div>
        </form>
    </div>
</div>
<div class="clearfix">...</div>
<!-- Modal -->
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
<script src="<?php echo base_url('resources/js/survey.js')?>"></script>
