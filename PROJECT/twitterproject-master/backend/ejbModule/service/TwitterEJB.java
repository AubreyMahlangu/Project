package service;

import javax.ejb.LocalBean;
import javax.ejb.Stateless;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;

import entities.TwitterEntities;

/**
 * Session Bean implementation class TwitterEJB
 */
@Stateless
@LocalBean
public class TwitterEJB {
	
	@PersistenceContext
	private EntityManager em;

    
    public TwitterEJB() {
        // TODO Auto-generated constructor stub
    }
    
    public void addNew(TwitterEntities twitterEntities)
    {
    	System.out.println("============================");
    	System.out.println(twitterEntities.getTwitterBody());
    	em.persist(twitterEntities);
    	System.out.println("============================");
    }

}
