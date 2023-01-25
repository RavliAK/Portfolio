package main;

public class PermaEmployee extends Recruit {
	//overloading
	public void setTotalsalary(int salary,int bonus){
	salary=getSalary();
	if(getPosition().equals("Teacher")){
		TotalSalary=(salary+(salary*(20/100)))+bonus;
	}else
	if(getPosition().equals("Staff")){
		TotalSalary=(salary+(salary*(15/100)))+bonus;
	}else
	if(getPosition().equals("Teacher")){
		TotalSalary=salary+bonus;
	}
	}
}
