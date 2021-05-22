
let exterior_surface_Choice =  document.querySelector(".exterior_surface").addEventListener('click', appear);


function appear()
{

    let  exterior_surface_response =  document.querySelectorAll(".exterior_surface input ");
    let exterior_surface =  document.querySelector("#exterior_surface_response");
    let response;

    for( var i =0; i<exterior_surface_response.length;i++)
    {
        if(exterior_surface_response[i].checked===true)
        {
             response = exterior_surface_response[i].value;

            break;


        }
    }

    if(response==="0")
    {

        exterior_surface.style.display= "none";

        //alert("nok");

    }

    else if(response==="1")
    {
        //alert("ok");

        exterior_surface.style.display="block";

    }


}