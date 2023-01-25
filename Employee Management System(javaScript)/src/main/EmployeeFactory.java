package main;

import main.Recruit;

public class EmployeeFactory {

	public Recruit createEmployee(int newEmployeeType) {
		// TODO Auto-generated constructor stub
		if(newEmployeeType==1){
			return new Employee();
		} else
		if(newEmployeeType==2){
			return new PermaEmployee();
		}
		else return null;
	}

}
