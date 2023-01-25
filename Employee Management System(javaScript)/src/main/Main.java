package main;
import java.util.ArrayList;
import java.util.Scanner;

public class Main {
	
	public Main() {
		// TODO Auto-generated constructor stub
	}
	
	public static void main(String[] args) {
		ArrayList<Recruit> Elist = new ArrayList<Recruit>();
		ArrayList<Recruit> PElist = new ArrayList<Recruit>();
		Scanner scan = new Scanner(System.in); 
		EmployeeFactory Efactory= new EmployeeFactory();
		Recruit newEmployee;
		// TODO Auto-generated method stub
		System.out.println("Logwarts School");
		System.out.println("===============");
		System.out.println("1.Insert Employee");
		System.out.println("2.Insert Permanent Employee");
		System.out.println("3.Exit");
		int menu=scan.nextInt(); 
		if(menu==1){
			newEmployee=Efactory.createEmployee(menu);
			System.out.println("input Employee Name[must start with 'Mr. ' | 'Mrs ']:");
			String nama=scan.nextLine();
			if(nama.startsWith("Mr.")||nama.startsWith("Mrs."))
			newEmployee.setName(nama);
			System.out.println("input Employee Address[must end with' Street']:");
			String alamat=scan.nextLine();
			if(alamat.endsWith("Street"))
			newEmployee.setAddress(alamat);
			System.out.println("input Employee Gender[Male | Female:");
			String kelamin=scan.nextLine();
			if(kelamin.equals("Male")||kelamin.equals("Female"))
			newEmployee.setGender(kelamin);
			System.out.println("input Employee Position[Teacher | Staff | Office boy]:");
			String posisi=scan.nextLine();
			if(posisi.equals("Teacher")||posisi.equals("Staff")||posisi.equals("Office boy"))
			newEmployee.setPosition(posisi);
			System.out.println("input Employee Salary [Minimum Salary 4000000]:");
			int gaji=scan.nextInt();
			if(gaji>=4000000)
			newEmployee.setSalary(gaji);
			newEmployee.setBonus(0);
			Elist.add(newEmployee);
			System.out.println("insert Employee Success! !");
			System.out.println("Name : "+newEmployee.getName());
			System.out.println("Address : "+newEmployee.getAddress());
			System.out.println("Gender : "+newEmployee.getGender());
			System.out.println("Position : "+newEmployee.getPosition());
			System.out.println("Salary : "+newEmployee.getTotalSalary());
		}else
		if(menu==2){
			newEmployee=Efactory.createEmployee(menu);
			System.out.println("input Employee Name[must start with 'Mr. ' | 'Mrs ']:");
			String nama=scan.nextLine();
			if(nama.startsWith("Mr.")||nama.startsWith("Mrs."))
			newEmployee.setName(nama);
			System.out.println("input Employee Address[must end with' Street']:");
			String alamat=scan.nextLine();
			if(alamat.endsWith("Street"))
			newEmployee.setAddress(alamat);
			System.out.println("input Employee Gender[Male | Female:");
			String kelamin=scan.nextLine();
			if(kelamin.equals("Male")||kelamin.equals("Female"))
			newEmployee.setGender(kelamin);
			System.out.println("input Employee Position[Teacher | Staff | Office boy]:");
			String posisi=scan.nextLine();
			if(posisi.equals("Teacher")||posisi.equals("Staff")||posisi.equals("Office boy"))
			newEmployee.setPosition(posisi);
			System.out.println("input Employee Salary [Minimum Salary 4000000]:");
			int gaji=scan.nextInt();
			if(gaji>=4000000)
			newEmployee.setSalary(gaji);
			System.out.println("input Employee Bonus Salary:");
			int bonus=scan.nextInt();
			if(bonus>5000000)
			newEmployee.setBonus(bonus);
			PElist.add(newEmployee);
			System.out.println("insert Employee Success! !");
			System.out.println("Name : "+newEmployee.getName());
			System.out.println("Address : "+newEmployee.getAddress());
			System.out.println("Gender : "+newEmployee.getGender());
			System.out.println("Position : "+newEmployee.getPosition());
			System.out.println("Salary : "+newEmployee.getTotalSalary());
			System.out.println("Bonus Salary : "+newEmployee.getBonus());
		}
			
		if(menu==3){
			System.exit(1);
		}else
		System.out.println("invalid answer");
	}

}
