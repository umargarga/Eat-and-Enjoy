

class HttpTask extends AsyncTask<String, String, String>{
        @Override
        protected void onPreExecute() {
            ProgressDialog progressDialog = ProgressDialog.show(IndividualRestaurantActivity.this, "Loading", "Please wait...");
            progressDialog.setCancelable(false);
        }

        @Override
        protected String doInBackground(String... params) {
            String result;
            URL url;
            HttpURLConnection connection = null;
            try {
                url = new URL(params[0]);
                connection = (HttpURLConnection) url.openConnection();

                result = "";
                    connection.setRequestMethod("GET");

                    //int responseCode = connection.getResponseCode();
                    InputStream is = connection.getInputStream();
                    if (is != null) {
                        BufferedReader bufferReader =
                                new BufferedReader(new InputStreamReader(is));
                        String line;
                        while ((line = bufferReader.readLine()) != null)
                            result += line;
                        is.close();
                        return result;
                    }

            }
            catch (Exception e) {
                result=""+e.getMessage();
            }
            finally {
                if(connection!=null)
                    connection.disconnect();
            }


            return result;
        }

        @Override
        protected void onPostExecute(String s) {
            if(progressDialog.isShowing())
                progressDialog.dismiss();

            super.onPostExecute(s);
            //tv1.setText(R.string.result + s);
            JSONObject object;
            String object_title;
            String object_type;
            String object_address;
            String object_description;
            String object_rating;

            try {
                object = new JSONObject(s);
                JSONObject object2 = object.getJSONArray("restaurant").getJSONObject(0);

                object_title = object2.getString("title");
                object_type = object2.getString("type");
                object_address = object2.getString("address");
                object_description = object2.getString("description");
                object_rating = object2.get("rating");


                title.setText(object_title);
                type.setText(object_type);
                address.setText(object_address);
                description.setText(object_description);
                rating.setRating(Float.parseFloat(object_rating));

            } catch (JSONException e) {
                e.printStackTrace();
            }

        }
    }
