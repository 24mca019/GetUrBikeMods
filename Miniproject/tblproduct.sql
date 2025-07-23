--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproductt` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
-- Insert Directly Into Your Table

INSERT INTO `tblproductt` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'Red Clutch Guards', 'rcg', 'product-images/cg.jpg', 550.00),
(2, 'Duke390 HandGuards', 'dhg', 'product-images/cg2.jpg', 1700.00),
(3, 'Golden Clutch Guards', 'gcg', 'product-images/cg3.jpg', 1100.00),
(4, 'Premium Clutch Guards', 'pcg', 'product-images/cg4.jpg', 1650.00),
(5, 'Golden Clutch Guards', 'gcg2', 'product-images/cg5.jpg', 1100.00),
(6, 'Black Clutch Guards', 'bcg', 'product-images/cg6.jpg', 1100.00)
(26, 'Fog Lamp', 'fl', 'product-images/fl.webp', 2000.00),
(27, 'Fog Lamp', 'fl2', 'product-images/fl2.jpg', 3500.00),
(28, 'Fog Lamp', 'fl3', 'product-images/fl3.jpg', 1500.00),
(29, 'Fog Lamp', 'fl4', 'product-images/fl4.jpg', 2100.00),
(30, 'Indicators', 'i', 'product-images/indicator.jpg', 300.00),
(31, 'Round Indicators', 'i2', 'product-images/indicator2.jpg', 350.00),
(32, 'YellowLine Indicator', 'i3', 'product-images/indicator3.jpg', 500.00),
(34, 'Body Indicators', 'i5', 'product-images/indicator6.jpg', 400.00),
(36, 'Arrow Indicator', 'i6', 'product-images/indicator8.jpg', 400.00),
(37, 'Indicator', 'i7', 'product-images/indicator9.webp', 800.00),
(38, 'Thunder Indicator', 'i8', 'product-images/indicator10.jpg', 900.00),
(39, 'ZX10R Mirrors', 'm', 'product-images/mirror.jpg', 1800.00),
(40, 'R1M Mirrors', 'm2', 'product-images/mirror2.jpg', 1200.00),
(41, 'ContinentalGT650 Mirrors', 'm3', 'product-images/mirror4.jpg', 1900.00),
(42, 'Mirrors', 'm4', 'product-images/mirror5.jpg', 900.00),
(43, 'Saddle Stay Himalayn', 'ss', 'product-images/ss.jpg', 4000.00),
(44, 'Saddle Stay Hunter350', 'ss2', 'product-images/ss2.jpg', 2500.00),
(45, 'Saddle Stay Classic350', 'ss3', 'product-images/ss3.jpg', 2700.00),
(46, 'Saddle Stay Meteor350', 'ss4', 'product-images/ss5.jpg', 3000.00),
(47, 'Saddle Stay ADV350', 'ss5', 'product-images/ss6.jpg', 3400.00),
(48, 'R15 Decals', 's', 'product-images/stick2.jpg', 2900.00),
(49, 'RC200 Decals', 's2', 'product-images/stick6.jpg', 2900.00),
(50, 'RS200 Decals', 's3', 'product-images/stick9.jpg', 2900.00);
--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproductt`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproductt`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;