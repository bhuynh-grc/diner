<?php
        //return true if the food has at least two characters
        function validFood($food){
//                if(strlen($food) <= 2){
//                    return false;
//                }else{
//                    return true;
//                }
                return strlen($food) > 2;
            }

            //Make sure user's meal is valid
            function validMead($meal){
//            if(in_array($meal, getMeal())){
//                return true;
//            }else{
//                return false;
//            }
            return in_array($meal, getMeal());
        }