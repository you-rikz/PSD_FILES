
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright 2022 © Bhemax4IT</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="template/vendor/global/global.min.js"></script>
	<script src="template/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="template/js/custom.min.js"></script>
		
    <!-- Chart Morris plugin files -->
    <script src="template/vendor/raphael/raphael.min.js"></script>
    <script src="template/vendor/morris/morris.min.js"></script>
		
	
	<!-- Chart piety plugin files -->
    <script src="template/vendor/peity/jquery.peity.min.js"></script>
	
		<!-- Demo scripts -->
    <script src="template/js/dashboard/dashboard-2.js"></script>
	
	<!-- Svganimation scripts -->
    <script src="template/vendor/svganimation/vivus.min.js"></script>
    <script src="template/vendor/svganimation/svg.animation.js"></script>

	<!-- Datatable -->
    <script src="template/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="template/js/plugins-init/datatables.init.js"></script>

        <!-- pickdate -->
    <script src="vendor/pickadate/picker.js"></script>
    <script src="vendor/pickadate/picker.time.js"></script>
    <script src="vendor/pickadate/picker.date.js"></script>
    <script src="../sweetalert/dist/sweetalert2.min.js"></script>
    <script>
                    document.querySelector(".logout-auto").onclick = function() {
                        Swal.fire({
                          title: 'Logout',
                          text: "Are you sure you want to logout?",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Yes'
                        }).then((result) => {
                          if (result.isConfirmed) {
                            Swal.fire(
                              'Logout',
                              'You have been successfully logged out.',
                              'success'
                            ).then((result) => {
                               window.location.href = "header.php?action=logout";
                             })
                          }
                        })
                    }
    </script>
</body>
</html>


                    <script type="text/javascript">
                        function removeselection() {  
                                document.getElementById("answer_div").innerHTML = '';
                                createSelection();
                                document.getElementById("questionform_submit").disabled = false;

                        }
                        document.getElementById("questionform_submit").disabled = true;
                        function createSelection(){

                            var myDiv = document.getElementById("answer_div");

                            var array = [];
                            array.push(document.getElementById("option_1").value);
                            array.push(document.getElementById("option_2").value);
                            array.push(document.getElementById("option_3").value);
                            array.push(document.getElementById("option_4").value);
                            array.push(document.getElementById("option_5").value);
     

                            //Create array of options to be added

                            //Create and append select list
                            var selectList = document.createElement("select");
                            selectList.setAttribute("id", "selectionoption");
                            selectList.setAttribute("name", "answer");
                            myDiv.appendChild(selectList);

                            //Create and append the options
                            for (var i = 0; i < array.length; i++) {
                                var option = document.createElement("option");
                                option.setAttribute("value", array[i]);
                                option.text = array[i];
                                selectList.appendChild(option);
                            }
                        }

                        function EDITremoveselection() {  
                                document.getElementById("EDITanswer_div").innerHTML = '';
                                EDITcreateSelection();
                        }

                        function EDITcreateSelection(answer=''){
                            var myDiv = document.getElementById("EDITanswer_div");

                            var array = [];
                            array.push(document.getElementById("EDIToption_1").value);
                            array.push(document.getElementById("EDIToption_2").value);
                            array.push(document.getElementById("EDIToption_3").value);
                            array.push(document.getElementById("EDIToption_4").value);
                            array.push(document.getElementById("EDIToption_5").value);
     

                            //Create array of options to be added

                            //Create and append select list
                            var selectList = document.createElement("select");
                            selectList.setAttribute("id", "EDITselectionoption");
                            selectList.setAttribute("name", "answer");
                            myDiv.appendChild(selectList);

                            //Create and append the options
                            for (var i = 0; i < array.length; i++) {
                                var option = document.createElement("option");
                                option.setAttribute("value", array[i]);
                                option.text = array[i];
                                if (array[i] == answer){
                                    option.selected = true;
                                }
                                selectList.appendChild(option);
                            }
                        }

                    function importData(course) {
                        var course = course;
                        let input = document.createElement('input');
                        input.type = 'file';
                        input.setAttribute("name", "csvfile");
                        input.setAttribute("id", "file_csv");
                        input.setAttribute("accept", ".csv");
                        input.onchange = _ => {
                        // you can use this method to get file and perform respective operations
                            let files =   Array.from(input.files);
                            var formData = new FormData();
                            formData.append("file", files[0]);
                            formData.append("course", course);
                            send_file_submit(formData);

                        };
                        input.click();
                    }

                    function selectscheckbox(){  
                        var ele=document.getElementsByName('ids[]');  
                        for(var i=0; i<ele.length; i++){  
                            if(ele[i].type=='checkbox'){  
                                if(ele[i].checked==true){
                                    ele[i].checked=false;
                                }else{
                                    ele[i].checked=true;
                                }
                            }
                        }  
                    }  
                    </script>