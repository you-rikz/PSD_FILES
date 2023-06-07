<div id="myDiv">Append here</div>
<input id="option_1" value="asdf">
                    <script type="text/javascript">
                        var myDiv = document.getElementById("myDiv");


                        var array = ["Volvo","Saab","Mercades","Audi"];
                        var option_1 = document.getElementById("option_1").value;
                        array.push(option_1);
                        //Create array of options to be added

                        //Create and append select list
                        var selectList = document.createElement("select");
                        selectList.setAttribute("id", "mySelect");
                        myDiv.appendChild(selectList);

                        //Create and append the options
                        for (var i = 0; i < array.length; i++) {
                            var option = document.createElement("option");
                            option.setAttribute("value", array[i]);
                            option.text = array[i];
                            selectList.appendChild(option);
                        }
                    </script>