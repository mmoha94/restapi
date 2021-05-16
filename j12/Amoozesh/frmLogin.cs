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
    public partial class frmLogin : Form
    {
        public frmLogin()
        {
            InitializeComponent();
        }

        private void btnLogin_Click(object sender, EventArgs e)
        {
            string res = RestClient.Request1(txtUser.Text , txtPass.Text);
            if (res != "Unauthorized")
            {
                Reply1 rep1 = JsonConvert.DeserializeObject<Reply1>(res);
                RestClient.Token = rep1.access_token;
                frmMain f = new frmMain();
                f.ShowDialog();
            }
            else MessageBox.Show("invalid user or pass");
        }
    }
}
