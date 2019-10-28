package model;

import java.util.Date;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.SessionScoped;

import entities.EmployeeEntity;
@ManagedBean(name = "employee")
@SessionScoped

public class Employee {
	private String name;
	private String surName;
	private Date dateOfBirth;
	
	public String getName() {
		return name;
	}
	public void setName(String name) {
		this.name = name;
	}
	public String getSurName() {
		return surName;
	}
	public void setSurName(String surName) {
		this.surName = surName;
	}
	public Date getDateOfBirth() {
		return dateOfBirth;
	}
	public void setDateOfBirth(Date dateOfBirth) {
		this.dateOfBirth = dateOfBirth;
	}
    
	public EmployeeEntity getEntity()
	{
		 EmployeeEntity employeentity = new EmployeeEntity();
		 
		 employeentity.setName(name);
		 employeentity.setName(surName);
         employeentity.setDateOfBirth(dateOfBirth);
		 
		 return employeentity;
	}
	
}
