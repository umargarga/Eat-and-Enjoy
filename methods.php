package com.tayseerproject.eatandenjoy;

import android.content.Intent;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Toast;

import org.json.JSONObject;

import java.io.DataOutputStream;
import java.io.IOException;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

public class RestaurantRegisterActivity extends AppCompatActivity {
    EditText title,description,address;
    RadioGroup radioGroup;
    RadioButton radioButton;
    Button register;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_restaurant_register);

        title = (EditText) findViewById(R.id.titleText);
        description = (EditText) findViewById(R.id.descriptionText);
        address = (EditText) findViewById(R.id.addressText);

        radioGroup = (RadioGroup) findViewById(R.id.radioGroup);

        register = (Button) findViewById(R.id.registerButton);

        register.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                int radioSelected = radioGroup.getCheckedRadioButtonId();
                radioButton = (RadioButton) findViewById(radioSelected);


                String titleValue, descriptionValue, addressValue, typeValue;
                titleValue = title.getText().toString();
                descriptionValue = description.getText().toString();
                addressValue = address.getText().toString();
                typeValue = radioButton.getText().toString();


                new HttpTask().execute(titleValue,descriptionValue,addressValue,typeValue);


            }
        });
    }


    public class HttpTask extends AsyncTask<String, String, String> {
        @Override
        protected void onPostExecute(String s) {
            super.onPostExecute(s);
            Toast.makeText(getBaseContext(), "Registration Successful", Toast.LENGTH_LONG).show();
            Intent i = new Intent(RestaurantRegisterActivity.this, MainActivity.class);
            startActivity(i);
        }


        @Override
        protected String doInBackground(String... params) {
            URL url;
            HttpURLConnection con;
            try {
                url = new URL("http://10.0.2.2:8888/v1/restaurant");
                con = (HttpURLConnection) url.openConnection();
                String title,description,address,type;
                title = params[0];
                description = params[1];
                address = params[2];
                type = params[3];


                con.setRequestMethod("POST");
                JSONObject data = new JSONObject();
                data.put("title", title);
                data.put("address", address);
                data.put("description", description);
                data.put("type", type);
                data.put("rating","0.0");

                con.setDoInput(true);
                con.setDoOutput(true);
                con.setRequestProperty("Content-Type", "application/json");

                if (data != null) {
                    DataOutputStream outputStream = new DataOutputStream(con.getOutputStream());
                    outputStream.writeBytes(data.toString());
                    outputStream.flush();
                    outputStream.close();
                }

            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            } catch(Exception e){
                e.printStackTrace();
            }
            return null;
        }
    }
}
