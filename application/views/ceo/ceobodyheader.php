<style>
    .btnWhite{
        background-color: white;
        border: none;
        color: #F57600;
        transition: 0.4s;
        width: 130px;
        border-radius: 12px;
    }
</style>
<header class="container p-5">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand text-color" href="<?php echo site_url('page/') ?>">AI 도시를부탁해!</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="d-flex navbar-nav mb-2 mb-lg-0">
                    <li clas="nav-item">
                        <a class="btn btn-secondary btn-sm shadow p-2 btn-bg m-2" id="qlink" href="<?php echo site_url('ceo/questions') ?>" role="button">문항 보기</a>
                    </li> 
                    <li clas="nav-item">
                        <a class="btn btn-secondary btn-sm shadow p-2 btn-bg m-2" id="valstatlink" href="<?php echo site_url('ceo/valuestatistic') ?>" role="button">가치 통계</a>
                    </li>
                    <li clas="nav-item">
                        <a class="btn btn-secondary btn-sm shadow p-2 btn-bg m-2" id="qstatlink" href="<?php echo site_url('ceo/questionstatistics') ?>" role="button">문항 통계</a>
                    </li> 
                </ul>
            </div>
        </div>
    </nav>
</header>