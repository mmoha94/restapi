using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using System.IO;
using System.Net;
using System.Web;
using System.Data;
using Newtonsoft.Json;

namespace Amoozesh
{
    class Reply1
    {
        public string status;
        public string message;
        public string access_token;
        public string token_type;
    }
    class Reply
    {
        public string  status;
        public string  message;
        public dynamic data;
    }
    class Req
    {
        public string section;
        public string method;
        public dynamic data;
    }
    class RestClient
    {
        public static string Token = "";
        public static string Request1( string username , string password)
        {
            string url = "http://127.0.0.1/restapi/j12/v1/token.php";
            string query = "username=" + username+ "&password="+password;
            byte[] arr = Encoding.ASCII.GetBytes(query);

            HttpWebRequest request = (HttpWebRequest)WebRequest.Create(url);
            request.Timeout = -1;
            request.Method = "POST";
            request.ContentLength = arr.Length;
            Stream reqStream = request.GetRequestStream();
            reqStream.Write(arr, 0, arr.Length);
            try
            {
                WebResponse response = request.GetResponse();
                Stream resStream = response.GetResponseStream();
                Encoding encode = Encoding.GetEncoding("utf-8");
                StreamReader readStream = new StreamReader(resStream, encode);
                string res = readStream.ReadToEnd();
                readStream.Close();
                response.Close();
                return res;
            }
            catch (WebException ex)
            {
                return ((HttpWebResponse)ex.Response).StatusCode.ToString();
            }
        }
        //.........
        public static string Request(string sec, string method, Dictionary<string, string> data = null)
        {
            string url = "http://127.0.0.1/restapi/j12/v1/api.php";

            Req req=new Req();
            req.section=sec;
            req.method=method;
            req.data=data;
            string json_data = JsonConvert.SerializeObject(req);

            byte[] arr = Encoding.UTF8.GetBytes(json_data);

            HttpWebRequest request = (HttpWebRequest)WebRequest.Create(url);

            request.Timeout = -1;
            request.Method = "POST";
            request.ContentType = "application/json";
            request.Headers.Add(HttpRequestHeader.Authorization, "bearer " + Token);
            request.ContentLength = arr.Length;
            Stream reqStream = request.GetRequestStream();
            reqStream.Write(arr, 0, arr.Length);
            try
            {
                WebResponse response = request.GetResponse();
                Stream recStream = response.GetResponseStream();
                Encoding encode = Encoding.GetEncoding("utf-8");
                StreamReader readStream = new StreamReader(recStream, encode);
                string res = readStream.ReadToEnd();
                readStream.Close();
                response.Close();
                return res;
            }
            catch (WebException ex)
            {
                return ((HttpWebResponse)ex.Response).StatusCode.ToString();
            }
        }

    }
}
