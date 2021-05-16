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
            dgStuds.DataSource = rep.data;
        }

        private void btnAdd_Click(object sender, EventArgs e)
        {
            Dictionary<string, string> data = new Dictionary<string, string>();
            data.Add("name", txtName.Text);
            data.Add("avgr", txtAvgr.Text);
            data.Add("fid", txtFid.Text);
            string res = RestClient.Request("studs", "add", data);
            MessageBox.Show(res);
        }
    }
}
