<?php include("check_session.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include("../link.php"); ?>
    <title>เพิ่มข้อมูลหน่วยการเรียน</title>
</head>

<body class="animsition">
    <?php include("header.php"); ?>
    <?php include("../alert.php"); ?>

    <?php
    $ck_id = $_GET["ck_id"];
    ?>

    <!-- content -->
    <div class="row">
        <div class="col-lg-10 mr-auto ml-auto">
            <div class="card">
                <?php
                $sql1 = "SELECT * from tb_checkteach ck
                inner join tb_subject sj on sj.sj_id = ck.sj_id
                where ck_id = '$ck_id'";
                $rs1 = $con->query($sql1);
                $r1 = $rs1->fetch_object();
                ?>
                <div class="card-header">
                    <div class="row">
                        <div class="col col-md-3">
                            <button type="button" class="btn btn-info" onclick="window.location.href='unit_manage.php?ck_id=<?= $ck_id ?>'">
                                Back
                            </button>
                        </div>
                        <div class="col-md-9">
                            <strong>เพิ่มข้อมูลหน่วยการเรียน</strong>
                        </div>
                    </div>
                </div>
                <div class="card-body card-block">
                    <form action="unit_controller.php" method="post" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">วิชา</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <label class=" form-control-label"><?= $r1->sj_name ?></label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">หน่วย</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="u_unit" pattern="[0-9]{1,}" title="กรอกตัวเลขเท่านั้น" maxlength="2" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">ชื่อหน่วย</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="u_name" rows="2" maxlength="100" class="form-control" required></textarea>
                            </div>
                        </div>
                </div>
                <div class="card-footer" align="center">
                    <input type="hidden" name="insert" value="<?= $ck_id ?>">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    <button type="reset" class="btn btn-danger">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end content -->

    <?php include("../script.php"); ?>
    <?php include("footer.php"); ?>
</body>

</html>