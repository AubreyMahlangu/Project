package controller;

import java.util.Date;

import javax.ejb.EJB;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.ManagedProperty;
import javax.faces.bean.SessionScoped;

import model.Employee;
import service.EmployeeEJB;

@ManagedBean(name = "employeecontroller")
@SessionScoped

public class EmployeeController {
     
	
	@EJB
	EmployeeEJB employeeEJB;
	
	
	//from form
	@ManagedProperty(value="#{employee}")
    private Employee employee;
    
	public Employee getEmployee() {
		return employee;
	}

	public void setEmployee(Employee employee) {
		this.employee = employee;
	}

	public void addNewEmployee()
	{
		System.out.println("method is in used");
		//employeeservices.addNew(employee.getEntity());
		//employeeservices.addNew(employee.getEntity());
		employeeEJB.addNew(employee.getEntity());
		
	   
	}
	
   }



