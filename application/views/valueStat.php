<style>
    .scale-div {
        border-radius: 2em;
        background-color: white;
    }
</style>
<div class="container-fluid p-3">
    <!-- header -->
    <div class="row">
        <div class="col-lg-2 col-xs-12 p-3 text-center offset-lg-1">
            <a href="<?php echo base_url('survey/') ?>" class="navbar-brand logo">AI 도시를 부탁해!</a>
        </div>
        <div class="col-lg-7 col-xs-12 p-3 d-flex flex-row-reverse bd-highlight offset-lg-1">

            <div class="p-2 bd-highlight"><a class="btn btn-secondary btn-sm shadow p-2 btn-bg  m-2" href="#">처음으로</a>
            </div>

            <div class="mt-3 p-2 bd-highlight"><a class="Abtn  btn-lg  p-2 text-color  m-2" href="#"
                    role="button">다시하기</a>
            </div>
            <div class="mt-3 p-2 bd-highlight"><a class="Abtn  btn-lg  p-2 text-color  m-2" href="#"
                    role="button">문항보기</a>
            </div>
        </div>
    </div>
    <!-- end header -->
    <div class="row">
        <div class="col-lg-7 col-xs-12 p-3 d-flex flex-row-reverse bd-highlight offset-lg-4">
            <div class="p-2 bd-highlight"><a class="btn btn-secondary btn-sm shadow p-2 btn-bg  " href="#"
                    role="button">조회</a>
            </div>
            <div class="col-lg-3 mt-3">
                <label for="form-select" class="select-label text-label-drop-down">성별</label>
                <select id="gender" class="form-select form-select-sm bg-color border-button">
                    <option>선택</option>
                    <option value="남성">남성</option>
                    <option value="여성">여성</option>
                </select>
            </div>
            <div class="col-lg-3 mt-3">
                <label for="form-select" class="select-label text-label-drop-down">성별</label>
                <select id="gender" class="form-select form-select-sm bg-color border-button ">
                    <option>선택</option>
                    <option value="남성">남성</option>
                    <option value="여성">여성</option>
                </select>
            </div>
            <div class="col-lg-3 mt-3">
                <label for="form-select" class="select-label text-label-drop-down">성별</label>
                <select id="gender" class="form-select form-select-sm bg-color border-button">
                    <option>선택</option>
                    <option value="남성">남성</option>
                    <option value="여성">여성</option>
                </select>
            </div>
        </div>
        <div class="col-lg-7 col-xs-12 p-3 d-flex flex-row-reverse bd-highlight offset-lg-4">
            <div class="text-center">
                <p>
                    <input class="form-check-input checkbox text-color" type="checkbox" value="agree"
                        id="confirm_agree">
                    내가 선택한 문항
                </p>
            </div>
        </div>
    </div>


    <div class="row p-5 justify-content-evenly">
        <div class="col-lg-5 col-xs-12 p-3  rounded-3 mt-5">
            <div class=" p-3">
                <canvas id="pie-chart" width="1000" height="650"></canvas>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
            </div>
        </div>



        <div class="col-lg-3 col-xs-12 d-grid gap-3">
            <div class="profile_head p-3  text-color">
                <div class="p-2 bd-highlight text-center">
                    <a class="btn btn-secondary btn-sm shadow p-2 btn-bg" href="#">STH</a>
                </div>
            </div>
            <div class="border border-warning rounded text-color">
                <div class=" col-12 picture-image">
                    <picture>
                        <source srcset="<?php echo base_url('resources/images/scale/scale1.svg') ?>"
                            type="image/svg+xml">
                        <img src="<?php echo base_url('resources/images/scale1.svg') ?>" class="img-fluid" alt="...">
                    </picture>
                </div>
                <div class=" col-12 picture-image">
                    <picture>
                        <source srcset="<?php echo base_url('resources/images/scale/scale2.svg') ?>"
                            type="image/svg+xml">
                        <img src="<?php echo base_url('resources/images/scale1.svg') ?>" class="img-fluid" alt="...">
                    </picture>
                </div>
                <div class=" col-12 picture-image">
                    <picture>
                        <source srcset="<?php echo base_url('resources/images/scale/scale3.svg') ?>"
                            type="image/svg+xml">
                        <img src="<?php echo base_url('resources/images/scale1.svg') ?>" class="img-fluid" alt="...">
                    </picture>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    new Chart(document.getElementById("pie-chart"), {
        type: 'pie',
        data: {
            labels: ["사회중시_H형 시장님", "사회중시_T형 시장님", "인간중시_T형 시장님", "인간중시_S형 시장님", "기술중시_S형 시장님", "기술중시_H형 시장님", "균형중시_A형 시장님", "균형중시_B형 시장님"],
            datasets: [{
                label: "answers",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#3cba9f", "#e8c3b9", "#c45850"],
                data: [2478, 5267, 734, 784, 433, 734, 784, 433]
            }]
        },
        options: {
            legend: {
                position: 'right',
                align: 'bottom',
                color: 'rgb(255, 99, 132)',
                padding: 20
            }
        }
    });
</script>