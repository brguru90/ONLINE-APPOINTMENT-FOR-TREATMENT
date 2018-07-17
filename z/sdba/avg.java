import java.awt.*;
import java.applet.*;
import java.util.*;
/*
<applet code="avg.java" width="900" height="900">
	<param name="per0" value="100" />
	<param name="per1" value="50" />
	<param name="per2" value="50" />
	<param name="per3" value="50" />
	<param name="per4" value="50" />
	<param name="per5" value="50" />
	<param name="per7" value="50" />
</applet>
*/
public class avg extends Applet
{
	Vector perc=new Vector();
	String org[];
	int k=40;
	public void init()
	{
		perc.addElement(getParameter("per0"));
		perc.addElement(getParameter("per1"));
		perc.addElement(getParameter("per2"));
		perc.addElement(getParameter("per3"));
		perc.addElement(getParameter("per4"));
		perc.addElement(getParameter("per5"));
		perc.addElement(getParameter("per6"));
	}
	public void paint(Graphics g)
	{
		//double pe=Integer.parseInt(per);
		//pe=pe*3.6;
		/*while(pe%10!=0)
		{
			pe=pe*10;
		}*/
		//int p=(int)pe;
		//per=Integer.toString(p)+"%";
		String percentage[]=new String[perc.size()];
		perc.copyInto(percentage);
		orderit(percentage);
		Color colors[]={Color.pink,Color.green,Color.blue,Color.yellow,Color.red,Color.blue,Color.orange};
		for(int i=0;i<org.length;i++)
		{
			barchart(org[i],g,colors[i]);
		}
		
	}
	
	void orderit(String percs[])
	{
		org=percs;
	if(false)
	{
		String orgn[]=org;
		for(int i=0;i<org.length;i++)
		{
			for(int j=0;j<org.length;j++)
			{
				if(org[i].compareTo(org[j])>-1)
				{
					String temp=org[i];
					org[i]=org[j];
					org[j]=temp;
				}
			}
		}
	}
	}
	/*
	void pichart(String percentage,Graphics g,Color col)
	{
		g.setColor(Color.red);
		g.drawOval(20,20,250,250);
		g.setColor(Color.white);
		g.fillOval(20,20,250,250);
		double pe=Integer.parseInt(percentage);
		pe=pe*3.6;
		int p=(int)pe;
		g.setColor(col);
		g.fillArc(20,20,250,250,0,p);
		g.setColor(Color.red);
		g.drawString(percentage,400,k);
		k+=15;

	}
	*/
	int sem=1;
	void barchart(String percentage,Graphics g,Color col)
	{
		//drawing vertcle line
		float j=0;
		for(float i=400;i>=40;i-=36)
		{
			int jj=(int)j;
			g.drawString(Integer.toString(jj),5,(int)i);
			j+=10;
		}
		g.drawLine(25,40,25,400);
		//drawing horizontal line
		g.drawLine(25,400,425,400);
		//drawing boxes
		double pe=Integer.parseInt(percentage);
		pe=pe*3.6;
		int p=(int)pe;
		g.setColor(col);
		g.fillRect(k,(150-p)+250,55,p);
		g.setColor(Color.blue);
		g.drawString(sem+"\'st sem",k,420);
		g.setColor(Color.black);
		g.drawString(percentage+"%",k+20,(150-p)+245);
		k+=60;
		sem++;
	}
}