package main;

public class Employee extends Recruit{
	//Overriding
	public void setTotalsalary(int salary){
		salary=getSalary();
		if(getPosition().equals("Teacher")){
			TotalSalary=salary+(salary*(20/100));
		}else
		if(getPosition().equals("Staff")){
			TotalSalary=salary+(salary*(15/100));
		}else
		if(getPosition().equals("Teacher")){
			TotalSalary=salary;
		}
	}
}