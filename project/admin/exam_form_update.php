<?php include("check_session.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include("../link.php"); ?>
    <title>แก้ไขข้อมูลข้อสอบ</title>
</head>

<body class="animsition">
    <?php include("header.php"); ?>
    <?php include("../alert.php"); ?>

    <!-- content -->
    <div class="row">
        <div class="col-lg-10 mr-auto ml-auto">
            <div class="card">
                <?php
                $ck_id = $_GET["ck_id"];
                $sql1 = "SELECT * from tb_checkteach ck
                inner join tb_subject sj on sj.sj_id = ck.sj_id
                where ck_id = '$ck_id'";
                $rs1 = $con->query($sql1);
                $r1 = $rs1->fetch_object();

                $e_id = $_GET["e_id"];
                $sql2 = "SELECT * from tb_exam
                where e_id = '$e_id'";
                $rs2 = $con->query($sql2);
                $r2 = $rs2->fetch_object();
                ?>
                <div class="card-header">
                    <div class="row">
                        <div class="col col-md-3">
                            <button type="button" class="btn btn-info" onclick="window.location.href='exam_manage.php?ck_id=<?= $ck_id ?>'">
                                Back
                            </button>
                        </div>
                        <div class="col-md-9">
                            <strong>แก้ไขข้อมูลข้อสอบ</strong>
                        </div>
                    </div>
                </div>
                <div class="card-body card-block">
                    <form action="exam_controller.php" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                                <select name="u_id" class="form-control" required>
                                    <option value="">กรุณาเลือกหน่วย</option>
                                    <?php
                                    $sqlu = "SELECT * from tb_unit u
                                    inner join tb_checkteach ck on ck.ck_id = u.ck_id
                                    where u.ck_id = '$ck_id' order by u_unit ";
                                    $rsu = $con->query($sqlu);
                                    while ($ru = $rsu->fetch_object()) {
                                    ?>
                                        <option value="<?= $ru->u_id; ?>" <?php if ($r2->u_id == $ru->u_id) {
                                                                                echo "selected";
                                                                            } ?>>หน่วยที่ <?= $ru->u_unit; ?> <?= $ru->u_name; ?></option>
                                    <?php }; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">คำถาม</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="e_qt" rows="2" maxlength="250" class="form-control" required><?= $r2->e_qt ?></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <?php if ($r2->e_qt_im != '') { ?>
                                    <button type="button" class="btn btn-danger" onclick="window.location.href='exam_controller.php?delete_img=<?php echo 'delete_img' ?>&e_id=<?= $e_id ?>&e_img=<?php echo 'e_qt_im' ?>&ck_id=<?= $ck_id ?>'">
                                        DELETE image
                                    </button>
                                <?php } ?>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" accept="image/*" id="imge_qt" name="e_qt_im" class="form-control-file">
                                <img class="showimg" id="showimge_qt" <?php if ($r2->e_qt_im != '') { ?> src="../images/<?= $r2->e_qt_im ?>" <?php } ?> />
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">ก.</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="e_c1" rows="2" maxlength="250" class="form-control" required><?= $r2->e_c1 ?></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <?php if ($r2->e_c1_im != '') { ?>
                                    <button type="button" class="btn btn-danger" onclick="window.location.href='exam_controller.php?delete_img=<?php echo 'delete_img' ?>&e_id=<?= $e_id ?>&e_img=<?php echo 'e_c1_im' ?>&ck_id=<?= $ck_id ?>'">
                                        DELETE image
                                    </button>
                                <?php } ?>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" accept="image/*" id="imge_c1" name="e_c1_im" class="form-control-file">
                                <img class="showimg" id="showimge_c1" <?php if ($r2->e_c1_im != '') { ?> src="../images/<?= $r2->e_c1_im ?>" <?php } ?> />
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">ข.</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="e_c2" rows="2" maxlength="250" class="form-control" required><?= $r2->e_c2 ?></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <?php if ($r2->e_c2_im != '') { ?>
                                    <button type="button" class="btn btn-danger" onclick="window.location.href='exam_controller.php?delete_img=<?php echo 'delete_img' ?>&e_id=<?= $e_id ?>&e_img=<?php echo 'e_c2_im' ?>&ck_id=<?= $ck_id ?>'">
                                        DELETE image
                                    </button>
                                <?php } ?>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" accept="image/*" id="imge_c2" name="e_c2_im" class="form-control-file">
                                <img class="showimg" id="showimge_c2" <?php if ($r2->e_c2_im != '') { ?> src="../images/<?= $r2->e_c2_im ?>" <?php } ?> />
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">ค.</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="e_c3" rows="2" maxlength="250" class="form-control" required><?= $r2->e_c3 ?></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <?php if ($r2->e_c3_im != '') { ?>
                                    <button type="button" class="btn btn-danger" onclick="window.location.href='exam_controller.php?delete_img=<?php echo 'delete_img' ?>&e_id=<?= $e_id ?>&e_img=<?php echo 'e_c3_im' ?>&ck_id=<?= $ck_id ?>'">
                                        DELETE image
                                    </button>
                                <?php } ?>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" accept="image/*" id="imge_c3" name="e_c3_im" class="form-control-file">
                                <img class="showimg" id="showimge_c3" <?php if ($r2->e_c3_im != '') { ?> src="../images/<?= $r2->e_c3_im ?>" <?php } ?> />
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">ง.</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="e_c4" rows="2" maxlength="250" class="form-control" required><?= $r2->e_c4 ?></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <?php if ($r2->e_c4_im != '') { ?>
                                    <button type="button" class="btn btn-danger" onclick="window.location.href='exam_controller.php?delete_img=<?php echo 'delete_img' ?>&e_id=<?= $e_id ?>&e_img=<?php echo 'e_c4_im' ?>&ck_id=<?= $ck_id ?>'">
                                        DELETE image
                                    </button>
                                <?php } ?>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" accept="image/*" id="imge_c4" name="e_c4_im" class="form-control-file">
                                <img class="showimg" id="showimge_c4" <?php if ($r2->e_c4_im != '') { ?> src="../images/<?= $r2->e_c4_im ?>" <?php } ?> />
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">เฉลย</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <div class="form-check-inline form-check">
                                    <label class="form-check-label ">
                                        <input type="radio" name="e_aw" value="1" class="form-check-input" <?php if ($r2->e_aw == '1') {
                                                                                                                echo "checked";
                                                                                                            } ?>>ตอบ 1
                                    </label>
                                    <label class="form-check-label ">
                                        <input type="radio" name="e_aw" value="2" class="form-check-input" <?php if ($r2->e_aw == '2') {
                                                                                                                echo "checked";
                                                                                                            } ?>>ตอบ 2
                                    </label>
                                    <label class="form-check-label ">
                                        <input type="radio" name="e_aw" value="3" class="form-check-input" <?php if ($r2->e_aw == '3') {
                                                                                                                echo "checked";
                                                                                                            } ?>>ตอบ 3
                                    </label>
                                    <label class="form-check-label ">
                                        <input type="radio" name="e_aw" value="4" class="form-check-input" <?php if ($r2->e_aw == '4') {
                                                                                                                echo "checked";
                                                                                                            } ?>>ตอบ 4
                                    </label>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer" align="center">
                    <input type="hidden" name="update" value="<?= $e_id ?>">
                    <input type="hidden" name="ck_id" value="<?= $ck_id ?>">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    <button type="reset" id="reset_imge" class="btn btn-danger" e_qt_im="<?= $r2->e_qt_im ?>" e_c1_im="<?= $r2->e_c1_im ?>" e_c2_im="<?= $r2->e_c2_im ?>" e_c3_im="<?= $r2->e_c3_im ?>" e_c4_im="<?= $r2->e_c4_im ?>">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end content -->
    <?php include("footer.php"); ?>
    <?php include("../script.php"); ?>


    <script>
        $(document).on('click', '', function() {
            var e_id = $(this).attr("e_id");
            var e_img = $(this).attr("e_img");
            var delete_img = "delete_img";
            $.ajax({
                url: "exam_controller.php",
                method: "POST",
                data: {
                    delete_img: delete_img,
                    e_id: e_id,
                    e_img: e_img
                }
            });
        });
    </script>

</body>

</html>