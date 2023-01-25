package main;

public class Recruit {
	private String Position;
	private String Name;
	private String Address;
	private String Gender;
	private int Salary;
	private int bonus;
	protected double TotalSalary;
	public double getTotalSalary() {
		return TotalSalary;
	}
	public void setTotalSalary(int Salary) {
		TotalSalary = Salary;
	}
	public int getBonus() {
		return bonus;
	}
	public void setBonus(int bonus) {
		this.bonus = bonus;
	}
	public int getSalary() {
		return Salary;
	}
	public void setSalary(int salary) {
		Salary = salary;
	}
	public String getPosition() {
		return Position;
	}
	public void setPosition(String position) {
		Position = position;
	}
	public String getName() {
		return Name;
	}
	public void setName(String name) {
		Name = name;
	}
	public String getAddress() {
		return Address;
	}
	public void setAddress(String address) {
		Address = address;
	}
	public String getGender() {
		return Gender;
	}
	public void setGender(String gender) {
		Gender = gender;
	}
	
}
