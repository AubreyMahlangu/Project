package model;

import java.util.Date;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.SessionScoped;

import entities.TwitterEntities;



@ManagedBean(name = "twitter")
@SessionScoped
public class Twitter {

	private String twitterBody;
	private Date timestamp;
	
	public String getTwitterBody() {
		return twitterBody;
	}
	public void setTwitterBody(String twitterBody) {
		this.twitterBody = twitterBody;
	}
	public Date getTimestamp() {
		return timestamp;
	}
	public void setTimestamp(Date timestamp) {
		this.timestamp = timestamp;
	}
	
	public TwitterEntities getEntity()
	{
		TwitterEntities  twitterentities = new TwitterEntities();
		timestamp = new Date(); 
		
		twitterentities.setTwitterBody(twitterBody);
		twitterentities.setTimestamp(timestamp);
		
		return twitterentities;
	}
}
