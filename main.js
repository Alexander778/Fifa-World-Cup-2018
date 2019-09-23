$(document).ready(function(){
    



        
    function calcResult(day,group,fteam,steam,arrP1,arrP2,arrD1,arrD2){

        var fTeam = "#"+"D"+day+group+fteam,
            sTeam = "#"+"D"+day+group+steam,
            diffF="#"+"d"+group+fteam,
            diffS="#"+"d"+group+steam,
            pointsF="#"+"p"+group+fteam,
            pointsS="#"+"p"+group+steam;
        
    

        var fteam = $(fTeam).val();
        var steam = $(sTeam).val();

        if(fteam > steam)
        {
            arrP1.push(3);
            arrP2.push(0);
            arrD1.push(fteam-steam);
            arrD2.push(steam-fteam);
            
        } else if(steam > fteam){
            arrP1.push(0);
            arrP2.push(3);
            arrD1.push(fteam-steam);
            arrD2.push(steam-fteam);
        } else {
            arrP1.push(1);
            arrP2.push(1);
            arrD1.push(fteam-steam);
            arrD2.push(steam-fteam);
        }
        var sumP1 = 0,
            sumP2 = 0,
            sumD1 = 0,
            sumD2 = 0;
        for (let i = 0; i < day; i++) {
            sumP1 += arrP1[i];
            sumP2 += arrP2[i];
            sumD1 +=arrD1[i];
            sumD2 +=arrD2[i];
        }
        $(pointsF).text(sumP1);
        $(pointsS).text(sumP2);
        $(diffF).text(sumD1);
        $(diffS).text(sumD2);
        checkResults(group);
}


function checkResults(group)
{
    var teams=[1,2,3,4],
            points1="p"+group+teams[0],
            points2="p"+group+teams[1],
            points3="p"+group+teams[2],
            points3="p"+group+teams[3],
            diff1="d"+group+teams[0],
            diff2="d"+group+teams[1],
            diff3="d"+group+teams[2],
            diff4="d"+group+teams[3];

    

       
}

$("#test").click(function(){
    alert("Test");
});



    // Rus-SauAra
    // $("#D1A2").change(function(){
    //     calcResult("1","A","1","2",arrPointsA1,arrPointsA2,arrDiffA1,arrDiffA2); 
    // });
    // //Egypt-Urug
    // $("#D1A4").change(function(){
    //     calcResult("1","A","3","4",arrPointsA3,arrPointsA4,arrDiffA3,arrDiffA4);
    // });

    function SortLowToHigh(a, b) {
        return a - b;
    }


    
    //Rus-Egyt
    $("#D2A3").change(function(){
        calcResult("2","A","1","3",arrPointsA1,arrPointsA3,arrDiffA1,arrDiffA3);
    });
     //SauAra-Urug
     $("#D2A4").change(function(){
        calcResult("2","A","2","4",arrPointsA2,arrPointsA4,arrDiffA2,arrDiffA4);
    });
});

function getTeams(val) {

	$.ajax({
	type: "POST",
	url: "get_team.php",
	data:'GroupId='+val,
	success: function(data){
        $("#teams1").html(data);
        $("#teams2").html(data);
	}
	});
}