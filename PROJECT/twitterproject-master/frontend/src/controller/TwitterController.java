package controller;

import javax.ejb.EJB;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.ManagedProperty;
import javax.faces.bean.SessionScoped;
import javax.ws.rs.POST;
import javax.ws.rs.Path;

import model.Twitter;
import service.TwitterEJB;
import twitter4j.DirectMessage;
import twitter4j.TwitterException;
import twitter4j.TwitterFactory;
import twitter4j.api.DirectMessagesResources;
import twitter4j.auth.AccessToken;
import twitter4j.auth.OAuthSupport;

@ManagedBean(name = "twittercontroller")
@SessionScoped


public class TwitterController {
	
	@EJB
	 TwitterEJB twitterEJB;
	
	@ManagedProperty(value="#{twitter}")
    private Twitter twitter;

	public Twitter getTwitter() {
		return twitter;
	}

	public void setTwitter(Twitter twitter) {
		this.twitter = twitter;
	}
	
	
	public void addNewTweet() throws Exception 
	{
		System.out.println("method is in used");
		
		twitterEJB.addNew(twitter.getEntity());
		
		  String consumerKey = "amW9MHvx0QRofEIspGdPs6crz" ;// key obtained after registering app.
			String consumerSecret ="FtZOuYTjzLdyNaQbGUeTxpMlGzPzQa7lhFOZ8ZtqS8MI6MgAac";// secret key obtained from the registered app.
			String twitterToken = "1146396159910563840-RTg4fFWxmQNIo6E76q5kXN2zKnrNQ2";
			// access_token received by authentication user's twitter account
			String twitterSecret= "xSrak39D1oZ8GbgvPIaLDV9AfAoEhZsDiOevK1FQbiDCR";
			 // access_secret obtained by authentication user's twitter account
			String directMessage= twitter.getTwitterBody();
			String twitterName = "@AdhLecturer";// twitter name of the receiver.
			
			   TwitterFactory factory = new TwitterFactory();
			   Twitter twitters = (Twitter) factory.getInstance();
			   ((OAuthSupport) twitters).setOAuthConsumer(consumerKey, consumerSecret);
			   AccessToken accessToken = new AccessToken(twitterToken, twitterSecret);
		       ((OAuthSupport) twitters).setOAuthAccessToken(accessToken);
			   DirectMessage directMessage1 = ((DirectMessagesResources) twitters).sendDirectMessage(twitterName, directMessage);
			
	}
	
	      
	
	
	
}
