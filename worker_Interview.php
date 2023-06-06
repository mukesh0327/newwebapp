<?php
session_start();
?>
<html lang="en">

<head>
    <?php
require_once("externalFile.php");    
?>
    <title>Interview</title>
</head>

<body>
    <?php
require_once("worker_header.php");    
?>
    <main role="InterView" id="InterView">
        <div class="container minHeigh">
            <div class="row">
                <div class="col-md-12 p-1">
                    <h1 class="txt-dark text-center pt-3 pb-2">InterView</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form name="InterviewForm">
                        <div id="q1">
                            <label class="lead mb-3">Q1. In a white wash, after how many hours is dissolved gum added to the solution?</label>
                            <div aria-label="MCQA Field">
                                <div class="float-left" style="width:48%">
                                    <div class="form-group">
                                        <label class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="radio" id="mcqa1" name="mcqa" checked aria-label="Radio button for following div" value="1">
                                                </div>
                                            </div>
                                            <div class="form-control">24 hours</div>
                                            <!--Readonly property can also be used in input field instand div-->
                                        </label>
                                    </div>
                                </div>
                                <div class="float-right" style="width:48%">
                                    <div class="form-group">
                                        <label class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="radio" id="mcqa2" name="mcqa" aria-label="Radio button for following div" value="2">
                                                </div>
                                            </div>
                                            <div class="form-control">12 hours</div>
                                            <!--Readonly property can also be used in input field instand div-->
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div aria-label="MCQA Field">
                                <div class="float-left" style="width:48%">
                                    <div class="form-group">
                                        <label class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="radio" id="mcqa3" name="mcqa" checked aria-label="Radio button for following div" value="3">
                                                </div>
                                            </div>
                                            <div class="form-control">6 hours</div>
                                            <!--Readonly property can also be used in input field instand div-->
                                        </label>
                                    </div>
                                </div>
                                <div class="float-right" style="width:48%">
                                    <div class="form-group">
                                        <label class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="radio" id="mcqa4" name="mcqa" aria-label="Radio button for following div" value="4">
                                                </div>
                                            </div>
                                            <div class="form-control">1 hours</div>
                                            <!--Readonly property can also be used in input field instand div-->
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="q2" style="display:none;">
                            <label class="lead mb-3">Q2. In a white wash, after how many hours is dissolved gum added to the solution?</label>
                            <div aria-label="MCQA Field">
                                <div class="float-left" style="width:48%">
                                    <div class="form-group">
                                        <label class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="radio" id="mcqa1" name="mcqa" checked aria-label="Radio button for following div" value="1">
                                                </div>
                                            </div>
                                            <div class="form-control">24 hours</div>
                                            <!--Readonly property can also be used in input field instand div-->
                                        </label>
                                    </div>
                                </div>
                                <div class="float-right" style="width:48%">
                                    <div class="form-group">
                                        <label class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="radio" id="mcqa2" name="mcqa" aria-label="Radio button for following div" value="2">
                                                </div>
                                            </div>
                                            <div class="form-control">12 hours</div>
                                            <!--Readonly property can also be used in input field instand div-->
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div aria-label="MCQA Field">
                                <div class="float-left" style="width:48%">
                                    <div class="form-group">
                                        <label class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="radio" id="mcqa3" name="mcqa" checked aria-label="Radio button for following div" value="3">
                                                </div>
                                            </div>
                                            <div class="form-control">6 hours</div>
                                            <!--Readonly property can also be used in input field instand div-->
                                        </label>
                                    </div>
                                </div>
                                <div class="float-right" style="width:48%">
                                    <div class="form-group">
                                        <label class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="radio" id="mcqa4" name="mcqa" aria-label="Radio button for following div" value="4">
                                                </div>
                                            </div>
                                            <div class="form-control">1 hours</div>
                                            <!--Readonly property can also be used in input field instand div-->
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="q3" style="display:none;">
                            <label class="lead mb-3">Q3. In a white wash, after how many hours is dissolved gum added to the solution?</label>
                            <div aria-label="MCQA Field">
                                <div class="float-left" style="width:48%">
                                    <div class="form-group">
                                        <label class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="radio" id="mcqa1" name="mcqa" checked aria-label="Radio button for following div" value="1">
                                                </div>
                                            </div>
                                            <div class="form-control">24 hours</div>
                                            <!--Readonly property can also be used in input field instand div-->
                                        </label>
                                    </div>
                                </div>
                                <div class="float-right" style="width:48%">
                                    <div class="form-group">
                                        <label class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="radio" id="mcqa2" name="mcqa" aria-label="Radio button for following div" value="2">
                                                </div>
                                            </div>
                                            <div class="form-control">12 hours</div>
                                            <!--Readonly property can also be used in input field instand div-->
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div aria-label="MCQA Field">
                                <div class="float-left" style="width:48%">
                                    <div class="form-group">
                                        <label class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="radio" id="mcqa3" name="mcqa" checked aria-label="Radio button for following div" value="3">
                                                </div>
                                            </div>
                                            <div class="form-control">6 hours</div>
                                            <!--Readonly property can also be used in input field instand div-->
                                        </label>
                                    </div>
                                </div>
                                <div class="float-right" style="width:48%">
                                    <div class="form-group">
                                        <label class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="radio" id="mcqa4" name="mcqa" aria-label="Radio button for following div" value="4">
                                                </div>
                                            </div>
                                            <div class="form-control">1 hours</div>
                                            <!--Readonly property can also be used in input field instand div-->
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="q4" style="display:none;">
                            <label class="lead mb-3">Q4. In a white wash, after how many hours is dissolved gum added to the solution?</label>
                            <div aria-label="MCQA Field">
                                <div class="float-left" style="width:48%">
                                    <div class="form-group">
                                        <label class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="radio" id="mcqa1" name="mcqa" checked aria-label="Radio button for following div" value="1">
                                                </div>
                                            </div>
                                            <div class="form-control">24 hours</div>
                                            <!--Readonly property can also be used in input field instand div-->
                                        </label>
                                    </div>
                                </div>
                                <div class="float-right" style="width:48%">
                                    <div class="form-group">
                                        <label class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="radio" id="mcqa2" name="mcqa" aria-label="Radio button for following div" value="2">
                                                </div>
                                            </div>
                                            <div class="form-control">12 hours</div>
                                            <!--Readonly property can also be used in input field instand div-->
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div aria-label="MCQA Field">
                                <div class="float-left" style="width:48%">
                                    <div class="form-group">
                                        <label class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="radio" id="mcqa3" name="mcqa" checked aria-label="Radio button for following div" value="3">
                                                </div>
                                            </div>
                                            <div class="form-control">6 hours</div>
                                            <!--Readonly property can also be used in input field instand div-->
                                        </label>
                                    </div>
                                </div>
                                <div class="float-right" style="width:48%">
                                    <div class="form-group">
                                        <label class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="radio" id="mcqa4" name="mcqa" aria-label="Radio button for following div" value="4">
                                                </div>
                                            </div>
                                            <div class="form-control">1 hours</div>
                                            <!--Readonly property can also be used in input field instand div-->
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" style="width:10%" id="next">Next</button>
                        <div class="form-group">
                            <input type="submit" onclick="" class="btn btn-block btn-black mt-5" name="interBtn" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php
require_once("footer.php");    
?>
    <script>
        n = 1;
        $(document).ready(function() {
            $("button").on("click", function(e) {
                e.preventDefault();
            });
            $("#next").click(function() {
                $("#q" + n).hide();
                n = n + 1;
                $("#q" + n).show();
            })
        });
    </script>
</body>

</html>