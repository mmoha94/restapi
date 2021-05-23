using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using Newtonsoft.Json;

namespace Amoozesh
{
    class Stud
    {
       public string sid;
       public string name;
       public string avgr;
       public string fid;
    }
    public partial class frmMain : Form
    {
        public frmMain()
        {
            InitializeComponent();
        }

        private void frmMain_Load(object sender, EventArgs e)
        {
            

        }

        private void button1_Click(object sender, EventArgs e)
        {
            string res = RestClient.Request("studs", "index");
            Reply rep = JsonConvert.DeserializeObject<Reply>(res);
            lblStatus.Text = rep.status;
            lblMessage.Text = rep.message;
            dgStuds.DataSource = rep.data;
        }

        private void btnAdd_Click(object sender, EventArgs e)
        {
            // save info 

            string res="";
            Dictionary<string, string> data = new Dictionary<string, string>();
            data.Add("sid" , txtSid.Text);
            data.Add("name", txtName.Text);
            data.Add("avgr", txtAvgr.Text);
            data.Add("fid", txtFid.Text);
            if (txtSid.Text=="")
                   res = RestClient.Request("studs", "add", data);
            else   res = RestClient.Request("studs", "update", data);

            Reply rep = JsonConvert.DeserializeObject<Reply>(res);
            lblStatus.Text = rep.status;
            lblMessage.Text = rep.message;
            MessageBox.Show(rep.message);

            button1_Click(sender, e);

            clearInfo();
        }

        private void btnNew_Click(object sender, EventArgs e)
        {
            clearInfo();
            txtName.Focus();
        }
        private void clearInfo()
        {
            txtSid.Clear();
            txtName.Clear();
            txtAvgr.Clear();
            txtFid.Clear();
        }

        private void btnDel_Click(object sender, EventArgs e)
        {
            Dictionary<string, string> data = new Dictionary<string, string>();
            string sid = dgStuds.CurrentRow.Cells[0].Value.ToString();
            data.Add("sid", sid);

            string res = RestClient.Request("studs", "delete" ,data );
            Reply rep = JsonConvert.DeserializeObject<Reply>(res);
            lblStatus.Text = rep.status;
            lblMessage.Text = rep.message;
            button1_Click(sender, e);
        }

        private void btnEdit_Click(object sender, EventArgs e)
        {
            Dictionary<string, string> data = new Dictionary<string, string>();
            string sid = dgStuds.CurrentRow.Cells[0].Value.ToString();
            data.Add("sid", sid);

            string res = RestClient.Request("studs", "edit", data);
            Reply rep = JsonConvert.DeserializeObject<Reply>(res);
            lblStatus.Text = rep.status;
            lblMessage.Text = rep.message;
            Stud st = JsonConvert.DeserializeObject<Stud>( rep.data.ToString() );
            txtSid.Text  = st.sid;
            txtName.Text = st.name;
            txtAvgr.Text = st.avgr;
            txtFid.Text  = st.fid;

        }

    }
}
