<style>
    .scale-div {
        border-radius: 2em;
        background-color: white;
    }
</style>
<div class="container-fluid p-3">
    <!-- header -->
    <div class="row p-3 justify-content-evenly">
        <div class="col-lg-2 col-xs-12 p-3 text-center">
            <h5 class="fw-bold mt-4 text-color">AI 도시를 부탁해!</h5>
        </div>
        <div class="col-lg-6 col-xs-12 p-3 d-flex flex-row-reverse bd-highlight offset-md-1">

            <div class="p-2 bd-highlight"><a class="btn btn-secondary btn-sm shadow p-2 btn-bg  m-2" href="#">처음으로</a>
            </div>
            <div class="mt-3 p-2 bd-highlight"><a class="Abtn  btn-lg  p-2 text-color  m-2" href="#"
                    role="button">다시하기</a>
            </div>
        </div>
        <div class="col-lg-6 col-xs-12 p-3 d-flex flex-row-reverse bd-highlight offset-md-4">
            <div class="p-2 bd-highlight"><a class="btn btn-secondary btn-sm shadow p-2 btn-bg  m-2" href="#"
                    role="button">조회</a></div>
            <div class="col-md-2 mt-3 justify-content-center">
                <label for="form-select" class="select-label text-label-drop-down">성별</label>
                <select id="gender" class="form-select form-select-sm bg-color border-button">
                    <option>선택</option>
                    <option value="남성">남성</option>
                    <option value="여성">여성</option>
                </select>
            </div>
            <div class="col-md-2  mt-3 justify-content-center">
                <label for="form-select" class="select-label text-label-drop-down">성별</label>
                <select id="gender" class="form-select form-select-sm bg-color border-button ">
                    <option>선택</option>
                    <option value="남성">남성</option>
                    <option value="여성">여성</option>
                </select>
            </div>
            <div class="col-md-2  mt-3 justify-content-center">
                <label for="form-select" class="select-label text-label-drop-down">성별</label>
                <select id="gender" class="form-select form-select-sm bg-color border-button">
                    <option>선택</option>
                    <option value="남성">남성</option>
                    <option value="여성">여성</option>
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-xs-12 p-3 d-flex flex-row-reverse bd-highlight offset-md-4">
            <div class="text-center">
                <p>
                    <input class="form-check-input checkbox text-color" type="checkbox" value="agree"
                        id="confirm_agree">
                    내가 선택한 문항
                </p>
            </div>
        </div>
    </div>
    <!-- end header -->


    <div class="row p-5 justify-content-evenly ">
        <div class="col-lg-6 col-xs-12 p-2 d-flex flex-row-reverse bd-highlight question-card ">
            <div class="col-lg-12 col-xs-12 p-5">
                <h5 class="fw-bold mt-4 text-color">1. AI 스피커를 통해 가정의 일상 대화를 수집하여 위기 상황시 출동하는 사회 안전망을 만들려고 합니다.
                    정확도를 높이기 위해서는 모든 가정에서 AI 스피커를 설치해야합니다. </h5>

                <div class="progress mt-5 m-5">
                    <span class="bold ">찬성</span>
                    <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0"
                        aria-valuemax="100"></div>
                    <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="30"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    <span class="bold">반대</span>
                </div>


                <!-- question div -->
                <div class="col-lg-12   col-xs-12 p-3 gap-2  d-flex  bd-highlight mySlides">

                    <div class="col-lg-6 question-stat-card p-4 agree-question-component" data-value="agree"
                        data-qnum="1">
                        <div class="text-center p-2 text-color">
                            <h5 class="fw-bold">
                                <input class="form-check-input checkbox" type="checkbox" value="agree"
                                    id="confirm_agree">
                                찬성 :

                                &nbsp;&nbsp; 안전에 도움이되어 사회공공에 이익이 됩니다.
                            </h5>
                        </div>
                    </div>
                    <div class="col-lg-6 question-stat-card p-4 disagree-question-card" data-value="disagree"
                        data-qnum="1">
                        <div class="text-center p-2 text-color">
                            <h5 class="fw-bold">
                                <input class="form-check-input checkbox" type="checkbox" value="agree"
                                    id="confirm_agree">
                                내가 반대 : &nbsp;&nbsp;문항

                                인간 존엄성을 해칩니다.
                            </h5>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row p-5 justify-content-evenly ">
        <div class="col-lg-6 col-xs-12 p-2 d-flex flex-row-reverse bd-highlight question-card ">
            <div class="col-lg-12 col-xs-12 p-5">
                <h5 class="fw-bold mt-4 text-color">2. 안면인식 CCTV를 도입하여 전과자 일상생활을 감시하고자 합니다. </h5>

                <div class="progress mt-5 m-5">
                    <span class="bold ">찬성</span>
                    <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0"
                        aria-valuemax="100"></div>
                    <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="30"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    <span class="bold">반대</span>
                </div>


                <!-- question div -->
                <div class="col-lg-12  col-xs-12 p-3 gap-2  d-flex  bd-highlight mySlides">

                    <div class="col-lg-6 question-stat-card p-4 agree-question-component" data-value="agree"
                        data-qnum="1">
                        <div class="text-center p-2 text-color">
                            <h5 class="fw-bold">
                                <input class="form-check-input checkbox" type="checkbox" value="agree"
                                    id="confirm_agree">
                                찬성 :&nbsp;&nbsp;

                                전과자의 행동을 감시하면 범죄율이 감소하여
                                사회 안전에 큰 도움이 될 것입니다.
                            </h5>
                        </div>
                    </div>
                    <div class="col-lg-6 question-stat-card p-4 disagree-question-card" data-value="disagree"
                        data-qnum="1">
                        <div class="text-center p-2 text-color">
                            <h5 class="fw-bold">
                                <input class="form-check-input checkbox" type="checkbox" value="agree"
                                    id="confirm_agree">
                                내가 반대 :&nbsp;&nbsp; 문항

                                전과자는 이미 죄에 대한 처벌을 받았습니다.
                                범죄자의 인권도 존중되어야 합니다.
                            </h5>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>