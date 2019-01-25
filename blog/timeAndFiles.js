function setTime(){
                        var myDate= new Date();
                        var days=myDate.getDate();
                        var month=myDate.getMonth()+1;
                        if (days<10) days="0"+days;
                        if (month<10) month="0"+month;
                        var hours=myDate.getHours();
                        var minutes=myDate.getMinutes();
                        if (hours<10) hours="0"+hours;
                        if (minutes<10) minutes="0"+minutes;

                        document.getElementById('data').value=myDate.getFullYear()+"-"+month+"-"+days;
                        document.getElementById('hour').value=hours+":"+minutes;
                }


function validateTime(){
                        var boxDate=document.getElementById('data').value;
                        var boxHour=document.getElementById('hour').value;

                        var hours=boxHour.split(':')
                        if (hours[0]>24 || hours[0]<0 || hours[1]<0 || hours[1]>60){
                                alert('Nieprawid�^�owa godzina');
                                setTime();
                        }
                        var dates=boxDate.split('-');
                        if (dates[0]<0 || dates[1]<1 || dates[1]>12 || dates[2]<1 || dates[2]>31){
                                alert('Nieprawid�^�owa data');
                                setTime();
                        }

                }

function addFile(){
	var mojElement = document.createElement('input');
        mojElement.type="file";
	mojElement.name="file"
        mojElement.id="file";
        mojElement.setAttribute('onchange','addFile();');
        document.body.appendChild(mojElement);
	linebreak = document.createElement("br");
	document.body.appendChild(linebreak);

}

